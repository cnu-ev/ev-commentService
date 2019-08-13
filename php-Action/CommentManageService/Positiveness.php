 <!--
==============================+===============================================================
 @ Author : jopemachine
 @ Team : team ⓒ EV for BottomUp
 @ Created : 2019-07-14, 18:20:24
 ==============================+===============================================================
-->

<?php
// 각 테이블 내 레코드들의 긍정, 부정 정도를 평균을 내서 상위 랭킹 10개 정도를 뽑아, 막대 그래프로 나타내자.
session_start();

$UserID = $_SESSION['user_id'];

// 세션에 ID가 없다면, 이용할 수 없으니, SignIn 페이지로 이동
if(!isset($UserID)){
  echo ("<script language=javascript>alert('먼저 로그인하세요!')</script>");
  echo ("<script>location.href='../SignIn.php';</script>");
  exit();
}

$URLID = $_POST['URLID'];

require_once('Comment.php');
require_once('../MySQLConection.php');

class Post{
  public $PostTitle;
  public $Positiveness;

  function __construct($_PostTitle, $_Positiveness){
    $this->PostTitle = $_PostTitle;
    $this->Positiveness = $_Positiveness;
  }
}

class Positiveness{

  public static function WarnNoComments(){

    return sprintf('
      <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" aria-label="Close" data-dismiss="alert">
          <span aria-hidden="true">&times;</span>
        </button>
        <p id="NoCommentsWarning" class="lead" style="font-size: 14px; color: #4c4c4c;">블로그에 등록된 댓글이 없습니다.</p>
      </div>
    ');
  }
}

$connect_object = MySQLConnection::DB_Connect($URLID) or die("Error Occured in Connection to DB");

// show tables로 모든 테이블 이름을 가져온다.
$showTables = '
  SHOW TABLES
';

$allTableName = mysqli_query($connect_object, $showTables);

// 긍정 평균치를 가중치로 하는 우선순위 큐
$pq = new SplPriorityQueue();

while($tableName = mysqli_fetch_array($allTableName)){

  if($tableName[0] == 'pagetitlepairs' || $tableName[0] == 'visitorcounter') continue;

  $selectTitle = "
    SELECT Title FROM pagetitlepairs WHERE PageID = '$tableName[0]'
  ";

  // 평균을 따로 구할 필요 없이 MySQL 내장 함수로 평균 값을 조회할 수 있다.
  $calcPositivenessAvg = "
    SELECT AVG(EmotionalAnalysisValue) FROM `" . $tableName[0] . "`";

  $selectTitleRet = mysqli_query($connect_object, $selectTitle) or die("Error Occured in selecting Title");
  $calcPositivenessAvgRet = mysqli_query($connect_object, $calcPositivenessAvg) or die("Error Occured in calcPositivenessAvg");

  $positivenessValueAvg = mysqli_fetch_array($calcPositivenessAvgRet);
  $title = mysqli_fetch_array($selectTitleRet);

  $pq->insert(new Post($title[0], $positivenessValueAvg[0]), $positivenessValueAvg[0]);
}

// DB에 따로 테이블로 두긴 양이 너무 적어 (10개로 고정) 코드에 넣었다
$backgroundColors = "
  rgba(255, 99, 132, 0.2)|
  rgba(54, 162, 235, 0.2)|
  rgba(255, 206, 86, 0.2)|
  rgba(75, 192, 192, 0.2)|
  rgba(226, 255, 163, 0.2)|
  rgba(168, 196, 255, 0.2)|
  rgba(211, 140, 255, 0.2)|
  rgba(240, 92, 242, 0.2)|
  rgba(57, 250, 215, 0.2)|
  rgba(219, 219, 219, 0.2)|
";

$borderColors = "
  rgba(255, 99, 132, 1)|
  rgba(54, 162, 235, 1)|
  rgba(255, 206, 86, 1)|
  rgba(75, 192, 192, 1)|
  rgba(226, 255, 163, 1)|
  rgba(168, 196, 255, 1)|
  rgba(211, 140, 255, 1)|
  rgba(240, 92, 242, 1)|
  rgba(57, 250, 215, 1)|
  rgba(219, 219, 219, 1)|
";

$backgroundColorsArr  = explode('|', preg_replace("/\s+/","", $backgroundColors));
$borderColorsArr      = explode('|', preg_replace("/\s+/","", $borderColors));

// 우선순위큐가 빌 때 까지 꺼냄
$index = 0;

$labels             = '';
$data               = '';
$backgroundColorStr = '';
$borderColorsStr    = '';

if($pq->count() < 1){
  echo Comment::WarnNoComments();
  exit();
}

while($pq->valid()){

  if($index >= 8) break;

  $iterator = $pq->current();
  $labels .= '\''. $iterator->PostTitle . '\',';
  $backgroundColorStr .= '\''. $backgroundColorsArr[$index] . '\',';
  $borderColorsStr .= '\''. $borderColorsArr[$index] . '\',';
  $data .= $iterator->Positiveness . ',';
  $pq->next();
  $index++;
}

// ChartJS 스크립트를 전송해, 해당 화면에 차트를 띄운다.
$barGraphScipts = sprintf("
  <script>
  var ctxB = document.getElementById(\"bar-graph\").getContext('2d');
  var myBarChart = new Chart(ctxB, {
      type: 'horizontalBar',
      data: {
          labels: [%s],
          datasets: [{
              label: '감정분석치 평균값',
              data: [%s],
              backgroundColor: [%s],
              borderColor: [%s],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
  });
  </script>",
  $labels, $data, $backgroundColorStr, $borderColorsStr);


echo sprintf('
  <div class="list-group">
    <a class="list-group-item active" style="background-color: #474747!important; color: #ffffff; border: none !important;">좋은 평가를 받은 게시물</a>
    <div class="list-group-item">
      <p class="lead">댓글들의 감정분석치 결과가 가장 높은 게시물들은 아래와 같습니다.</p>
      <canvas id="bar-graph"></canvas>
      %s
    </div>
  </div>
  ', $barGraphScipts);
