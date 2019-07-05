<h2>Outline</h2>
ev-front는 지킬 기반의 블로그에 댓글 서비스를 쉽게 추가할 수 있도록 하기 위해 만든 댓글 컴포넌트 및 댓글 서비스 홈페이지 (백엔드) 프로젝트를 포함하고 있다.  

백엔드는 모두 php를 사용해 작성했고, DB는 mySQL을 사용했다.



<h2>How to Use</h2>
EV-Script.html은 지킬 기반의 블로그에서 쉽게 댓글 서비스를 추가할 수 있도록 만든 컴포넌트 파일이다.  

URL을 서비스에 등록하고 사용하는 절차는 아래와 같다.

```
1 - http://evcommentservice.ga에 가입하고, + 버튼을 클릭해, 서비스를 사용할 홈페이지의 URL을 등록한다.
URL을 등록할 때 http:{domain}.ga 처럼 등록해야 하고, 뒤에 / 가 붙으면 안 된다.

2 - _config.yml (프로젝트 설정 파일) 에 아래와 같은 설정을 추가한다. User ID는 위에서 가입한 홈페이지의 ID를 등록한다.

ev_username: {User ID}

3 - EV-Script.html 파일을 post layout 또는 원하는 페이지에 추가한다.

4 - 댓글 창을 넣을 공간에 div 태그를 만들고 id를 EV-Start로 설정한다.
```
