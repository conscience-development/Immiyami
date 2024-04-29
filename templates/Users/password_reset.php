<!--=====================================
                    USER-LOGIN PART START
        =======================================-->
<section class="user-form-part">
    <div class="user-form-banner">
        <div class="user-form-content">
            <a href="#"><img src="/front/images/logo.png" alt="logo"></a>
            <h1>No more agents! <span>Plan immigration yourself!</span></h1>
            <p>Get your membership today!</p>
        </div>
    </div>

    <div class="user-form-category">
        <div class="user-form-header">
            <a href="/"><img src="/front/images/logo.png" alt="logo"></a>
            <a href="/"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="user-form-category-btn">
            <ul class="nav nav-tabs">
                <li><a href="#login-tab" class="nav-link" data-toggle="tab"></a></li>
                <li><a href="#register-tab" class="nav-link" id="signUpTab" data-toggle="tab"></a></li>
            </ul>
        </div>
        <?= $this->Flash->render() ?>






        <div class="tab-pane active" id="reset-tab">
            <div class="user-form-title">
                <h2>Reset Password!</h2>
                <p>Reset your password.</p>
            </div>
            <?= $this->Form->create(NULL) ?>
            <div class="row" id="reSetPass">
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <input type="password" class="form-control" pattern=".{6,}" required name="password" id="passM"
                            placeholder="Password">
                        <button class="form-icon" type="button"><i class="eyeM fas fa-eye"></i></button>
                        <small class="form-alert">Password must be 6 characters</small>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <input type="password" class="form-control" pattern=".{6,}" required name="c_password"
                            id="passMC" placeholder="Repeat Password">
                        <button class="form-icon" type="button"><i class="eyeMC fas fa-eye"></i></button>
                        <small class="form-alert">Password must be 6 characters</small>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-inline reg-btn-sub-d">
                            <i class="fas fa-unlock"></i>
                            <span>Reset Password</span>
                        </button>
                    </div>
                </div>
            </div>
            <?= $this->Form->end() ?>
            <div class="user-form-direction">
                <p></p>
            </div>
        </div>

    </div>
</section>