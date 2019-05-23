<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>WeatherProject</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.html" class="logo"><strong>WeatherProject</strong> by CBC</a>
								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
											<h2>Daily Temperature Changes</h2>
										</header>
										<!--
										<select name="demo-category" id="demo-category">
											<option value="" disabled selected>- SELECT REGION -</option>
											<option value="" disabled>** 서울특별시 **</option>
											<option value="관악산">관악산</option>
											<option value="서울">서울</option>
											<option value="" disabled>** 부산광역시 **</option>
											<option value="부산">부산</option>
											<option value="" disabled>** 대구광역시 **</option>
											<option value="대구">대구</option>
											<option value="대구(기)">대구(기)</option>
											<option value="" disabled>** 인천광역시 **</option>
											<option value="강화">강화</option>
											<option value="백령도">백령도</option>
											<option value="인천">인천</option>
											<option value="" disabled>** 광주광역시 **</option>
											<option value="광주">광주</option>
											<option value="" disabled>** 대전광역시 **</option>
											<option value="대전">대전</option>
											<option value="" disabled>** 울산광역시 **</option>
											<option value="울산">울산</option>
											<option value="" disabled>** 경기도 **</option>
											<option value="동두천">동두천</option>
											<option value="수원">수원</option>
											<option value="양평">양평</option>
											<option value="이천">이천</option>
											<option value="파주">파주</option>
											<option value="" disabled>** 강원도 **</option>
											<option value="강릉">강릉</option>
											<option value="대관령">대관령</option>
											<option value="동해">동해</option>
											<option value="북강릉">북강릉</option>
											<option value="북춘천">북춘천</option>
											<option value="삼척">삼척</option>
											<option value="속초">속초</option>
											<option value="영월">영월</option>
											<option value="원주">원주</option>
											<option value="인제">인제</option>
											<option value="정선군">정선군</option>
											<option value="철원">철원</option>
											<option value="춘천">춘천</option>
											<option value="태백">태백</option>
											<option value="홍천">홍천</option>
											<option value="" disabled>** 충청북도 **</option>
											<option value="보은">보은</option>
											<option value="제천">제천</option>
											<option value="청주">청주</option>
											<option value="추풍령">추풍령</option>
											<option value="충주">충주</option>
											<option value="" disabled>** 충청남도 **</option>
											<option value="금산">금산</option>
											<option value="보령">보령</option>
											<option value="부여">부여</option>
											<option value="서산">서산</option>
											<option value="천안">천안</option>
											<option value="홍성">홍성</option>
											<option value="" disabled>** 전라북도 **</option>
											<option value="고창">고창</option>
											<option value="고창군">고창군</option>
											<option value="군산">군산</option>
											<option value="남원">남원</option>
											<option value="부안">부안</option>
											<option value="순창군">순창군</option>
											<option value="임실">임실</option>
											<option value="장수">장수</option>
											<option value="전주">전주</option>
											<option value="정읍">정읍</option>
											<option value="" disabled>** 전라남도 **</option>
											<option value="강진군">강진군</option>
											<option value="고흥">고흥</option>
											<option value="광양시">광양시</option>
											<option value="목포">목포</option>
											<option value="보성군">보성군</option>
											<option value="순천">순천</option>
											<option value="여수">여수</option>
											<option value="영광군">영광군</option>
											<option value="완도">완도</option>
											<option value="장흥">장흥</option>
											<option value="주암">주암</option>
											<option value="진도(첨찰산)">진도(첨찰산)</option>
											<option value="진도군">진도군</option>
											<option value="해남">해남</option>
											<option value="흑산도">흑산도</option>
											<option value="" disabled>** 경상북도 **</option>
											<option value="경주시">경주시</option>
											<option value="구미">구미</option>
											<option value="문경">문경</option>
											<option value="봉화">봉화</option>
											<option value="상주">상주</option>
											<option value="안동">안동</option>
											<option value="영덕">영덕</option>
											<option value="영주">영주</option>
											<option value="영천">영천</option>
											<option value="울릉도">울릉도</option>
											<option value="울진">울진</option>
											<option value="의성">의성</option>
											<option value="청송군">청송군</option>
											<option value="포항">포항</option>
											<option value="" disabled>** 경상남도 **</option>
											<option value="거제">거제</option>
											<option value="거창">거창</option>
											<option value="김해시">김해시</option>
											<option value="남해">남해</option>
											<option value="밀양">밀양</option>
											<option value="북창원">북창원</option>
											<option value="산청">산청</option>
											<option value="양산시">양산시</option>
											<option value="의령군">의령군</option>
											<option value="진주">진주</option>
											<option value="창원">창원</option>
											<option value="통영">통영</option>
											<option value="함양군">함양군</option>
											<option value="합천">합천</option>
											<option value="" disabled>** 제주도 **</option>
											<option value="고산">고산</option>
											<option value="서귀포">서귀포</option>
											<option value="성산">성산</option>
											<option value="성산포">성산포</option>
											<option value="제주">제주</option>
										</select>
									-->
										<p>Aenean ornare velit lacus, ac varius enim ullamcorper eu. Proin aliquam facilisis ante interdum congue. Integer mollis, nisl amet convallis, porttitor magna ullamcorper, amet egestas mauris. Ut magna finibus nisi nec lacinia. Nam maximus erat id euismod egestas. Pellentesque sapien ac quam. Lorem ipsum dolor sit nullam.</p>
										<ul class="actions">
											<li><a href="#" class="button big">Learn More</a></li>
										</ul>
									</div>
									<span class="image object">
										<img src="images/pic10.jpg" alt="" />
									</span>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Erat lacinia</h2>
									</header>
									<div class="features">
										<article>
											<span class="icon fa-diamond"></span>
											<div class="content">
												<h3>Portitor ullamcorper</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
										<article>
											<span class="icon fa-paper-plane"></span>
											<div class="content">
												<h3>Sapien veroeros</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
										<article>
											<span class="icon fa-rocket"></span>
											<div class="content">
												<h3>Quam lorem ipsum</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
										<article>
											<span class="icon fa-signal"></span>
											<div class="content">
												<h3>Sed magna finibus</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
									</div>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Ipsum sed dolor</h2>
									</header>
									<div class="posts">
										<article>
											<a href="#" class="image"><img src="images/pic01.jpg" alt="" /></a>
											<h3>Interdum aenean</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic02.jpg" alt="" /></a>
											<h3>Nulla amet dolore</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic03.jpg" alt="" /></a>
											<h3>Tempus ullamcorper</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic04.jpg" alt="" /></a>
											<h3>Sed etiam facilis</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic05.jpg" alt="" /></a>
											<h3>Feugiat lorem aenean</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic06.jpg" alt="" /></a>
											<h3>Amet varius aliquam</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
									</div>
								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<br><br><br>
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="index.html">Home</a></li>
										<li>
											<span class="opener">Comparison</span>
											<ul>
												<li><a href="#">By region</a></li>
												<li><a href="#">By date</a></li>
											</ul>
										</li>
										<li><a href="#">Prediction</a></li>
										<li><a href="team.html">About Team</a></li>
									</ul>
								</nav>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
