<h2>Outline</h2>
ev-front는 **지킬 기반의 블로그**에 댓글 서비스를 쉽게 추가할 수 있도록 하기 위해 만든 댓글 컴포넌트 및 댓글 서비스 홈페이지 (백엔드) 프로젝트를 포함하고 있다.  

백엔드는 모두 php를 사용해 작성했고, DB는 mySQL을 사용했다.



<h2>Details</h2>

evcommentservice.ga 홈페이지 프론트엔 모바일 환경에서도 용이하게 사용할 수 있도록 Bootstrap을 적용했다.

홈페이지에 사용된 svg 아이콘은 아래 페이지에서 다운로드해 사용했다.

https://feathericons.com/



<h2>Environment Details</h2>

>xampp for windows 7.1.30, xampp control panel 3.2.4
>
>Apache 2.4.39
>
>MariaDB 10.3.16 (mySQL)
>
>phpMyAdmin 4.9.0.1
>
>Bootstrap 4.3.1, popper.js, mdb.js
>
>JQuery 3.2.1



<h2>How to Use</h2>
EV-Script.html은 지킬 기반의 블로그에서 쉽게 댓글 서비스를 추가할 수 있도록 만든 컴포넌트 파일이다.  

URL을 서비스에 등록하고 사용하는 절차는 아래와 같다.

```
1 - https://evcommentservice.ga에 가입하고, + 버튼을 클릭해, 서비스를 사용할 홈페이지의 URL을 등록한다.
URL을 등록할 때 https:{domain}.ga 처럼 등록해야 하고, 뒤에 / 가 붙으면 안 되는 것에 주의.

2 - _config.yml (프로젝트 설정 파일) 에 아래와 같은 설정을 추가한다. User ID는 위에서 가입한 홈페이지의 ID를 등록한다.

ev_username: {User ID}

3 - EV-Script.html 파일을 post layout 또는 원하는 페이지에 추가한다.

4 - 댓글 창을 넣을 공간에 div 태그를 만들고 id를 EV-Start로 설정한다.
```
