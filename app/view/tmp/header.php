<header>
	<div class="container" style="min-height: 150px; padding: 20px 0">
		<div class="col-md-6">
			<a href="/">
				<?php logo(); ?>
			</a>
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-3">
		    <br>
		    <div id="signupDiv">
		    	<?php
		    		if(isset($_SESSION['user_id'])) {
		    			echo "<a href=\"/notlarim\">Notlarım</a>&nbsp;|&nbsp;<a href=\"/cikis\">Çıkış Yap</a>";
		    		} else {
		    			echo "<a href=\"/kayit\">Kayıt Ol</a>&nbsp;|&nbsp;<a href=\"/giris\">Giriş Yap</a>";
		    		}
		    	?>
		    </div>

		    <div class="marginTB10">
		    	<form action="/ara" method="post">
		    		<div class="input-group">
				      <input type="text" class="form-control" placeholder="Ara.." name="search">
				      <span class="input-group-btn">
				      	<button class="btn btn-default" type="submit">
							<i class="fa fa-search"></i>
				      	</button>
				      </span>
				    </div>
		    	</form>
		    </div>
		</div>
	</div>
	<nav class="navbar navbar-inverse no-border">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse no-border">
          <ul class="nav navbar-nav">
            <li class=""><a href="/">Anasayfa</a></li>
            <li><a href="/fakulte">Notlar</a></li>
            <li><a href="/not-ekle">Not Ekle</a></li>
            <li><a href="/#hakkimizda">Hakkımızda</a></li>
            <li><a href="/#iletisim">İletişim</a></li>
			
          </ul>
        </div>
      </div>
    </nav>
</header>