<h1 align="center">
    <a href="https://ev-commentService.ga">
    Emotion Visualization Comment Service
  </a>
</h1>

<p align="center">
  <strong>ⓒ Team EV</strong><br>
  2019 BottomUp
</p>

<p align="center">
    <img src="eevee.jpg" width="120px" height="120px">
</p>


CNU-EV는 감정 분석 기능을 제공하는 댓글 컴포넌트 서비스를 제공하기 위해 구성된 3개의 프로젝트입니다.



- [**ev-commentService**][a] :  지킬형 블로그에 댓글을 달 수 있게 컴포넌트 스크립트를 제공합니다. 그 외 '최근 생성된 댓글', '좋은 평가를 받은 게시물', '인기 포스팅 분석', '댓글이 많은 게시물' 서비스를 제공합니다.

  

- [**ev-backend**][b] : 분석사이트를 제작하는 Team-Ev의 backend repository 입니다. Django를 기반으로 제작되었으며, konlpy와 tensorflow 를 기반으로 하는 감정분석 판별기를 포함합니다.



- [**ev-sentimentalAnalysis**][c] : 쟝고 서버 내 댓글 감정 분석 모듈입니다.



[a]: https://github.com/cnu-ev/ev-commentService
[b]: https://github.com/cnu-ev/ev-backend
[c]: https://github.com/cnu-ev/ev-sentiment_analysis



## 🏄 How to use

EV-Script.html은 Github Page 등 지킬 기반의 블로그에서 쉽게 댓글 서비스를 추가할 수 있도록 만든 컴포넌트 파일이다.  

지킬 기반의 블로그에서 URL을 서비스에 등록하고 사용하는 절차는 아래와 같다.

```
1 - https://evcommentservice.ga에 가입하고, + 버튼을 클릭해, 서비스를 사용할 홈페이지의 
URL을 등록한다.  
URL을 등록할 때 https:{domain}.ga 처럼 등록해야 하고, 뒤에 / 가 붙으면 안 되는 것에 주의.

2 - _config.yml (프로젝트 설정 파일) 에 아래와 같은 설정을 추가한다. 
User ID는 위에서 가입한 홈페이지의 ID를 등록한다.

ev_username: {User ID}

3 - EV-Script.html 파일을 post layout 또는 원하는 페이지에 추가한다.
({% include EV-Script.html %}를 추가하거나 직접 스크립트 내용을 붙여넣는다.)

4 - 댓글 창을 넣을 공간에 div 태그를 만들고 id를 EV-Start로 설정한다.
```



## 📖 How to evaluate comment





## 📋 Development Environment Details

```
##### Front, PHP Server #####
xampp for windows 7.1.30, xampp control panel 3.2.4
Apache 2.4.39
MariaDB 10.3.16 (MySQL)
phpMyAdmin 4.9.0.1
Bootstrap 4.3.1, popper.js, mdb.js, chart.js
JQuery 3.2.1
Ruby Sass 3.7.4

##### Emotion Analasis Djanjo Server #####
absl-py==0.7.1
astor==0.8.0
boto==2.49.0
boto3==1.9.194
botocore==1.12.194
certifi==2019.6.16
chardet==3.0.4
Django==2.0.13
django-cors-headers==3.0.2
docutils==0.14
gast==0.2.2
gensim==3.8.0
google-pasta==0.1.7
grpcio==1.22.0
h5py==2.9.0
idna==2.8
jmespath==0.9.4
joblib==0.13.2
JPype1==0.7.0
Keras-Applications==1.0.8
Keras-Preprocessing==1.1.0
konlpy==0.5.1
Markdown==3.1.1
mecab-python==0.996
numpy==1.16.4
pkg-resources==0.0.0
protobuf==3.9.0
pybind11==2.3.0
python-dateutil==2.8.0
pytz==2019.1
requests==2.22.0
s3transfer==0.2.1
scikit-learn==0.21.2
scipy==1.3.0
six==1.12.0
smart-open==1.8.4
tensorboard==1.14.0
tensorflow==1.14.0
tensorflow-estimator==1.14.0
termcolor==1.1.0
urllib3==1.25.3
uWSGI==2.0.18
Werkzeug==0.15.5
wrapt==1.11.2
```



## 🎉 Screen Shots





