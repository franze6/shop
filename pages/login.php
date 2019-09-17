<?php
?>
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Авторизация</h2>
						<form id="login-send" action="#">
                            <input type="hidden" name="do" value="login"/>
							<input name="login" type="text" placeholder="E-mail" />
							<input name="pass" type="password" placeholder="Пароль" />
							<span>
								<input name="remember" type="checkbox" class="checkbox">
Запомнить меня
</span>
							<button type="submit" class="btn btn-default">Войти</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">ИЛИ</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Регистрация</h2>
						<form id="signup-send" action="#">
							<input type="text" placeholder="Имя"/>
							<input type="email" placeholder="E-mail"/>
							<input type="password" placeholder="Пароль"/>
							<button type="submit" class="btn btn-default">Зарегестрироваться</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
