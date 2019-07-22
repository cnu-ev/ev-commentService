<h2>Outline</h2>
ev-commentService는 Jekyll 기반의 블로그에 댓글 서비스를 쉽게 추가할 수 있도록 하기 위해 만든 댓글 컴포넌트와 해당 사이트에 달린 댓글들에 대한 분석 기능을 제공하고 있다.  

사이트에서 제공하는 분석 기능은 '최근 생성된 댓글', '좋은 평가를 받은 게시물', '인기 포스팅 분석', '댓글이 많은 게시물' 이다.



<h2>Details</h2>
백엔드는 모두 php를 사용해 작성했고, DB는 mySQL을 사용했다.

evcommentservice.ga 홈페이지엔 모바일 환경에서도 용이하게 사용할 수 있도록 Bootstrap을 적용했다.

프로젝트에 사용된 svg 아이콘은 모두 아래 페이지에서 다운로드해 사용한 것이다.

https://feathericons.com


<h2>Environment Details</h2>
>xampp for windows 7.1.30, xampp control panel 3.2.4
>
>Apache 2.4.39
>
>MariaDB 10.3.16 (MySQL)
>
>phpMyAdmin 4.9.0.1
>
>Bootstrap 4.3.1, popper.js, mdb.js, chart.js
>
>JQuery 3.2.1
>
>Ruby Sass 3.7.4 

그 외 도메인 임대는 freenom (https://www.freenom.com/en/index.html?lang=en),  

https 프로토콜 등록은 cloudFlare (https://jsdev.kr/t/https-cloudflare-flexible-ssl/1973) 를 이용했다.

<h2>How to Use</h2>
EV-Script.html은 Github Page 등 지킬 기반의 블로그에서 쉽게 댓글 서비스를 추가할 수 있도록 만든 컴포넌트 파일이다.  

지킬 기반의 블로그에서 URL을 서비스에 등록하고 사용하는 절차는 아래와 같다.

```
1 - https://evcommentservice.ga에 가입하고, + 버튼을 클릭해, 서비스를 사용할 홈페이지의 URL을 등록한다.  
URL을 등록할 때 https:{domain}.ga 처럼 등록해야 하고, 뒤에 / 가 붙으면 안 되는 것에 주의.

2 - _config.yml (프로젝트 설정 파일) 에 아래와 같은 설정을 추가한다. User ID는 위에서 가입한 홈페이지의 ID를 등록한다.

ev_username: {User ID}

3 - EV-Script.html 파일을 post layout 또는 원하는 페이지에 추가한다.
({% include EV-Script.html %}를 추가하거나 직접 스크립트 내용을 붙여넣는다.)

4 - 댓글 창을 넣을 공간에 div 태그를 만들고 id를 EV-Start로 설정한다.
```



블로거는 자신의 블로그 댓글 서비스에 감정 분석 서비스를 적용할 지 안 할지, 적용한다면 어떻게 스타일링 될 지를 결정할 수 있다. 사용법은 아래와 같다.  

주의할 점으로, none 모드에서 달린 댓글엔 full 모드로 바꿔도 여전히 감정 분석 서비스가 제공되지 않는다. 아래 ev_mode는 디폴트 값으로, full을 갖는다.  

```
_config.yml 내 ev_mode에 아래와 같은 값을 설정한다.

ev_username: {full, binary, none}

full : 댓글 내용의 부정 ~ 긍정 정도에 따라 색상을 10 단계로 나눠 적용한다.

binary : 댓글 내용의 부정, 긍정 여부에 따라 색상을 두 단계로만 나눠 적용한다.

none : 댓글 감정 분석 서비스를 이용하지 않는다.
```
