<form action="/user/registerUser" method="post">
        <div class="card">
          <div class="card-image primary-500">
            <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" height="130"/>
            <span class="card-title"><h3>Welcome to KACHING!</h3></span>
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
                <i class="material-icons prefix">account_circle</i>
                <input id="name" name="name" type="text" class="validate"
                       value="<?php echo isset($name) ? $name : ''; ?>" required>
                <label for="name">Name</label>
              </div>
              <div class="input-field col l10 offset-l1 m12">
                <i class="material-icons prefix">email</i>
                <input id="email" name="email" type="email" class="validate"
                       value="<?php echo isset($email) ? $email : ''; ?>" required>
                <label for="email">Email</label>
              </div>
              <div class="input-field col l5 offset-l1 m12">
                <i class="material-icons prefix">lock</i>
                <input id="password" name="password" type="password" class="validate" required minlength="8">
                <label for="password">Password</label>
              </div>
              <div class="input-field col l5 m12">
                <i class="material-icons prefix">lock_outline</i>
                <input id="password_confirm" name="password_confirm" type="password" class="validate" required minlength="8">
                <label for="password_confirm">Password Confirmation</label>
              </div>
            </div>
            <br/>
            <div class="card-action">
              <button class="btn btn-large btn-large waves-effect waves-light secondary-accent right" type="submit"
                      name="action">
                Sign Up
              </button>
              <br/>
            </div>
          </div>
        </div>
      </form>