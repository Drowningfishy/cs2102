<form action="/user/login" method="post">
        <div class="card">
          <div class="card-image primary-500">
            <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" height="130"/>
            <span class="card-title"><h3>Welcome back!</h3></span>
          </div>
          <div class="card-content">
            <div class="row">
              <?php if (isset($error)) { ?>
                <div class="input-field col l10 offset-l1 m12">
                  <?php include APP . 'view/error/_card.php' ?>
                  <br />
                </div>
              <?php } ?>
              <div class="input-field col l10 offset-l1 m12">
                <i class="material-icons prefix">email</i>
                <input id="email" name="email" type="email" class="validate"
                       value="<?php echo isset($email) ? $email : ''; ?>">
                <label for="email">Email</label>
              </div>
              <div class="input-field col l10 offset-l1 m12">
                <i class="material-icons prefix">lock</i>
                <input id="password" name="password" type="password" class="validate">
                <label for="password">Password</label>
              </div>
            </div>
            <br/>
            <div class="card-action">
              <a class="btn btn-flat btn-large left blue-text text-darken-1" href="/user/register">Sign Up</a>
              <button class="btn btn-floating btn-large waves-effect waves-light secondary-accent right" type="submit"
                      name="action">
                <i class="material-icons right">send</i>
              </button>
              <br/>
            </div>
          </div>
        </div>
      </form>