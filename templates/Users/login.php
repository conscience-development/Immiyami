<!--=====================================
                    USER-LOGIN PART START
        =======================================-->
<section class="user-form-part">
    <div class="user-form-banner">
        <div class="user-form-content">
            <a href="#"><img src="/front/images/logo.png" alt="logo"></a>
            <h1><span>Plan immigration yourself!</span></h1>
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
                <li><a href="#login-tab" class="nav-link active" data-toggle="tab">sign in</a></li>
                <li><a href="#register-tab" class="nav-link" id="signUpTab" data-toggle="tab">sign up</a></li>
            </ul>
        </div>
        <?= $this->Flash->render() ?>
        <div class="tab-pane active" id="login-tab">
            <div class="user-form-title">
                <h2>Welcome!</h2>
                <p>Use credentials to access your account.</p>
            </div>
            <?= $this->Form->create(NULL,['type'=>'file']) ?>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input type="email" name="email" required id="loginEmail" class="form-control"
                            placeholder="Email Address *">
                        <small class="form-alert">Please follow this example - XXXX@XXXX.XXX</small>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="password" name="password" required class="form-control" id="pass"
                            placeholder="Password *">
                        <button type="button" class="form-icon"><i class="eye fas fa-eye"></i></button>
                        <small class="form-alert">Password must be 6 characters</small>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="signin-check">
                            <label class="custom-control-label" for="signin-check">Remember me</label>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group text-right ">
                        <a href="#forget-tab" data-toggle="tab" class="form-forgot">Forgot password?</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" onclick="lsRememberMe()" class="btn btn-inline">
                            <i class="fas fa-unlock"></i>
                            <span>Enter your account</span>
                        </button>
                    </div>
                </div>
            </div>
            <?= $this->Form->end() ?>
            <div class="user-form-direction">
                <p>Don't have an account? Click on the <span><a href="/Users/login?type=register">( sign up )</a></span>
                    button above.</p>
            </div>
        </div>

        <div class="tab-pane" id="register-tab">
            <div class="user-form-title">
                <h2>Register</h2>
                <p>Setup a new account in a minute.</p>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 text-center">
                    <div class="form-group text-center">
                        <div class="form-check  text-center">
                            <div class="col-xs-12 col-sm-12 text-center">
                                <input type="radio" class="" style="" id="radio1" required name="role" value="member"
                                    checked>
                            </div>
                            <div class="col-xs-12 col-sm-12 text-center">
                                <label class="form-check-label" for="radio1">Member<br>(Immigration Seeker)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6  text-center">
                    <div class="form-group  text-center">
                        <div class="form-check  text-center">
                            <div class="col-xs-12 col-sm-12 text-center">
                                <input type="radio" class="" style="" id="radio2" required name="role" value="supplier">
                            </div>
                            <div class="col-xs-12 col-sm-12 text-center">
                                <label class="form-check-label" for="radio2">Supplier<br>(Service provider)</label>
                            </div>
                        </div>
                    </div>
                </div>

                <?= $this->Form->create(NULL,['url' => '/Users/register','id'=>'regMember','onsubmit'=>'return validateConfPassword()']) ?>
                <div class="row member">

                    <input type="hidden" class="form-check-input  form-control" name="role" value="member">
                    <input type="hidden" class="form-check-input  form-control" name="package"
                        value="<?=$memberPackage;?>">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control first_name" name="first_name"
                                onkeydown="return /[a-z]/i.test(event.key)" placeholder="First Name *" required>
                            <small class="form-alert">Enter your first name here</small>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control last_name" name="last_name"
                                onkeydown="return /[a-z]/i.test(event.key)" required placeholder="Last Name *">
                            <small class="form-alert">Enter your last name here</small>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <? echo $this->Form->control('country_id', ['label'=>false,'required'=>true,'options' => $countries, 'empty' => true,'class'=>'multi-select wide form-control','empty' => 'Your Country *']); ?>
                            <small class="form-alert">Pick your country</small>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <small>Contact Number *</small>
                            <input type="tel" class="form-control" onkeypress='validateTP(event)' name="contact" 
                                required id="phone">
                            
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <input type="email" class="form-control email" name="email" required id='memberMail'
                                placeholder="Email Address *">
                            <small class="form-alert">Please follow this example - XXXX@XXXX.XXX</small>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <? echo $this->Form->control('preferred_country_id', ['label'=>false,'required'=>true,'options' => $preferredCountries, 'empty' => true,'class'=>'multi-select wide form-control','empty' => 'Preferred Country *']); ?>
                            <small class="form-alert">Pick your preferred country</small>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <input type="password" class="form-control" pattern=".{6,}" required name="password"
                                id="passM" placeholder="Password *">
                            <button class="form-icon" type="button"><i class="eyeM fas fa-eye"></i></button>
                            <small class="form-alert">Password must be 6 characters</small>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <input type="password" class="form-control" pattern=".{6,}" required name="c_password"
                                id="passMC" placeholder="Repeat Password *">
                            <button class="form-icon" type="button"><i class="eyeMC fas fa-eye"></i></button>
                            <small class="form-alert">Password must be 6 characters</small>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group readmoreser">
                            <div class="readmorecond">

                                <h3><strong>Terms of Service</strong></h1>
                                    <p><em>Published on 2022/03/26</em></p>
                                    <h4>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Introduction</h4>
                                    <p>Welcome to&nbsp;ImmiYami&nbsp;(“ImmiYami”, “we”, “our”, “us”)! As You have just
                                        arrived
                                        at our Terms of Service, please pause, grab a cup of coffee and carefully read
                                        the
                                        following pages. It will take You approximately 20 minutes.</p>
                                    <p>“ImmiYami” is the trading name of Duchy Global Limited (New Zealand Company)
                                        along with
                                        their respective directors, officers, employees, licensees, contractors,
                                        attorneys,
                                        agents, successors and assigns.</p>
                                    <p>IMMIYAMI.COM IS NOT ACTING AS AN IMMIGRATION AGENT/LAWYER/ADVICER. IMMIYAMI IS A
                                        COMMON
                                        PLATFORM WHERE IMMGRATION SEEKERS AND IMMIGRATION SERVICE PROVIDERS MEET EACH
                                        OTHER.</p>
                                    <p>&nbsp;“You” or “Your” is either: i) a registered business that wish to or already
                                        purchases any product or service made available through the Service incl. the
                                        business’
                                        respective directors, officers, employees, licensees, contractors, attorneys,
                                        agents,
                                        successors and assigns (“Business Customer”); or ii) a private individual that
                                        wish to
                                        or already purchases any products or service made available through the Service
                                        (“Consumer”).</p>
                                    <p>Our Privacy Policy also governs Your use of our Service and explains how we
                                        collect,
                                        safeguard and disclose information that results from Your use of our web pages.
                                        Please
                                        read it <a href="https://www.immiyami.com/pages/privacy-policy" target="_blank"
                                            rel="noopener noreferrer">https://www.immiyami.com/pages/privacy-policy</a>
                                        . If you are a Business
                                        Customer
                                        we act from a position of a “data processor” for any personal data you provide
                                        us that
                                        relates to private individuals, and our role, together with the security
                                        measures we
                                        apply, is detailed in the DPA.</p>
                                    <p>Your agreement with us includes these Terms, our Privacy Policy, and, where
                                        applicable,
                                        the DPA (“Agreements”). You acknowledge that You have read and understood the
                                        Agreements, and agree to be bound by them.</p>
                                    <p>If You do not agree with (or cannot comply with) the Agreements, then You may not
                                        use
                                        (and must immediately stop using) the Service, but please let us know by
                                        emailing at
                                        support@immiyami.com so we can try to find a solution. These Terms apply to all
                                        visitors, users and others who wish to access or use Service.</p>
                                    <p>Thank You for being responsible.</p>
                                    <h4>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Communications</h4>
                                    <p>When creating an account on our Service, You will be asked to select marketing
                                        preferences which allow You to subscribe to newsletters, marketing or
                                        promotional
                                        materials and other information we may send.&nbsp;</p>
                                    <p>You may opt out of receiving any, or all, of these communications from us by
                                        accessing
                                        Your Account Settings on the Service, or by following the unsubscribe link at
                                        the bottom
                                        of each of our marketing communications.</p>
                                    <p>For additional information about how we protect Your privacy, please refer to our
                                        Privacy
                                        Policy at&nbsp;<a href="https://www.immiyami.com/pages/privacy-policy"
                                            target="_blank"
                                            rel="noopener noreferrer">https://www.immiyami.com/pages/privacy-policy</a>
                                    </p>
                                    <h4>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Purchases and Membership</h4>
                                    <p>If You wish to purchase any product, service or membership made available through
                                        the
                                        Service (“Purchase”), You may be asked to supply certain information relevant to
                                        Your
                                        Purchase including, without limitation, Your credit card number, the expiration
                                        date of
                                        Your credit card, Your billing address, and Your shipping information.</p>
                                    <p>You represent and warrant that: (i) You have the legal right to use any credit
                                        card(s) or
                                        other payment method(s) in connection with any Purchase; and (ii) the
                                        information You
                                        supply to us is true, correct and complete.</p>
                                    <p>We may employ the use of third-party services for the purpose of facilitating
                                        payment and
                                        the completion of Purchases. By submitting Your payment information, You
                                        understand that
                                        we may share that information with these third parties subject to our Privacy
                                        Policy.
                                    </p>
                                    <p>Your Purchase is not confirmed until You receive a confirmation email from us. In
                                        particular, we reserve the right to reject Your Purchase due to product or
                                        service
                                        unavailability, or if fraud or an unauthorized or illegal transaction is
                                        suspected.</p>
                                    <p>All prices shown on the Service are as a standard denominated in USD. We may
                                        determine to
                                        show the prices in the currency that ImmiYami determines to be your local
                                        currency. All
                                        prices shown to Consumers include applicable sales taxes at the rate that is in
                                        force
                                        from time to time.</p>
                                    <h4>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contests, Sweepstakes and Promotions</h4>
                                    <p>Any contests, sweepstakes or other promotions (collectively, “Promotions”) made
                                        available
                                        through the Service may be governed by rules that are separate from these Terms.
                                        If You
                                        participate in any Promotions, please review the applicable rules as well as our
                                        Privacy
                                        Policy. If the rules for a Promotion conflict with these Terms, the rules
                                        governing the
                                        Promotion will prevail.</p>
                                    <h4>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subscriptions / Membership / Payments</h4>
                                    <p>Some parts of the Service are subject to payments. Paid Services are usually
                                        provided on
                                        a recurring subscription or membership basis (“Subscription(s)”(Membership(s)),
                                        but we
                                        may also provide them on a fixed-term basis (“Fixed Term”). Fixed Term Services
                                        are paid
                                        against the invoice according to the payment terms agreed separately
                                        (Advertistment(s))
                                        and classified(s)). Unless otherwise agreed, Subscription and membership payment
                                        terms
                                        shall not apply to Fixed Term Services. If you are interested in Fixed Term
                                        Services,
                                        please contact us. Subscriptions are billed in advance on a recurring and
                                        periodic basis
                                        (“Billing Cycle”). The relevant Billing Cycle will be displayed to You at
                                        check-out, on
                                        Your quote or on Your invoice.</p>
                                    <p>At the end of each Billing Cycle, Your Subscription will automatically renew
                                        under the
                                        exact same conditions unless You cancel it or ImmiYami cancels it. If Your
                                        Subscription
                                        is on an annual basis, we will let You know at least thirty (30) days in advance
                                        of any
                                        automatic renewal in order to give You the opportunity to cancel your
                                        Subscription. You
                                        may cancel Your Subscription renewal either through Your online account
                                        management page
                                        or by contacting our customer support team.</p>
                                    <p>A valid payment method, including credit card, is required to process the payment
                                        for
                                        Your Subscription. You shall provide ImmiYami with accurate and complete billing
                                        information including full name, address, state, zip code, telephone number, GST
                                        number
                                        (if applicable) and a valid payment method information. By submitting such
                                        payment
                                        information, You automatically authorise ImmiYami to charge all Subscription
                                        fees
                                        incurred through Your account to any such payment instruments.</p>
                                    <p>Should automatic billing fail to occur for any reason, ImmiYami may (but does not
                                        have an
                                        obligation to) issue an electronic invoice indicating that You must proceed
                                        manually,
                                        within a certain deadline date, with the full payment corresponding to the
                                        billing
                                        period as indicated on the invoice.</p>
                                    <p>We reserve the right to terminate Your Subscription in the event we are unable to
                                        collect
                                        a relevant payment from You (whether automatically or manually). Where that
                                        happens, we
                                        will inform You of the termination of Your Subscription via email.</p>
                                    <h4>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Free Trial</h4>
                                    <p>We may, at our sole discretion, offer a Subscription with a free trial for a
                                        limited
                                        period of time (“Free Trial”).</p>
                                    <p>You may be required to enter Your billing information in order to sign up for a
                                        Free
                                        Trial. If You do enter Your billing information when signing up for Free Trial,
                                        You will
                                        not be charged by ImmiYami until your Free Trial has expired. On the last day of
                                        the
                                        Free Membership/Subscription/ Fees period, unless You cancelled Your Membership
                                        /
                                        Subscription/Fees, You will be automatically charged the applicable Subscription
                                        fees
                                        for the type of Subscription You have selected.</p>
                                    <h4>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fee Changes</h4>
                                    <p>ImmiYami, in its sole discretion and at any time, may modify advertising and
                                        classified
                                        fees for the future payments. We will inform You of any change to Your
                                        advertising fees
                                        at least thirty (30) days in advance to give You an opportunity to renew your
                                        contract
                                        before such change becomes effective. Any Subscription fee change will become
                                        effective
                                        on the earlier of the expiry of that thirty (30)-day period, or at the end of
                                        the
                                        then-current Billing Cycle, whichever is earlier.</p>
                                    <p>Your continued use of a Subscription after a Subscription fee change comes into
                                        effect
                                        constitutes Your agreement to pay the revised Subscription fee amount.</p>
                                    <h4>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Refunds</h4>
                                    <p>If you make any Purchase on the Service as a Consumer/Member, you have the right
                                        to
                                        request a refund of the applicable Purchase price without providing a reason at
                                        any time
                                        within seven (07) days of the original date of purchase. As your Purchase can be
                                        used by
                                        you immediately, we reserve the right to only issue a pro-rated refund which
                                        reflects
                                        the amount of time you have enjoyed the Purchase before claiming a refund.</p>
                                    <p>To request a refund (or partial refund), please contact us by using the contact
                                        details
                                        at the bottom of these Terms. We will issue any refund as soon as possible to
                                        the
                                        payment method used for the original Purchase.</p>
                                    <p>Refunds do not apply to Business Customers (Sponsors).</p>
                                    <h4>9.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Content</h4>
                                    <p>Our Service allows You to post, link, store, share and otherwise make available
                                        certain
                                        information, text, graphics, videos, or other material. (together, Your
                                        “Content”).&nbsp;</p>
                                    <p>You are responsible for Content that You post on through the Service, including
                                        its
                                        legality, reliability, and appropriateness.</p>
                                    <p>By posting or creating Content on or through the Service, You represent and
                                        warrant that:
                                        (i) Content is Yours (You own it) and/or You have the right to use it and the
                                        right to
                                        grant us the rights and licence as provided in these Terms, and (ii) the posting
                                        of Your
                                        Content on or through the Service does not violate the privacy rights, publicity
                                        rights,
                                        copyrights, contract rights, intellectual property rights or any other rights of
                                        any
                                        person or entity. We reserve the right to terminate Your account in the event
                                        You
                                        infringe this provision.</p>
                                    <p>You retain any and all of Your rights to any Content You submit, post, display or
                                        create
                                        on or through the Service and You are responsible for protecting those rights.
                                        We take
                                        no responsibility and assume no liability for Content You post or create on or
                                        through
                                        the Service. &nbsp;</p>
                                    <p>ImmiYami has the right but not the obligation to monitor and edit all Content
                                        submitted
                                        by users on the Service.&nbsp;</p>
                                    <p>By uploading through the Service, You grant ImmiYami a free of charge,
                                        non-exclusive,
                                        perpetual, transferable, royalty-free, irrevocable, worldwide licence to: (i)
                                        deliver
                                        the Service to You; and (ii) use the Content for internal research and
                                        development
                                        and/or to improve the Service. Where Content includes personal information about
                                        private
                                        individuals this will be further regulated by our Privacy Policy, DPA, or other
                                        individual agreement.&nbsp;</p>
                                    <p>You shall ensure that Your Content complies with, and assist ImmiYami to comply
                                        with, the
                                        requirements of all legislation and regulatory requirements in force from time
                                        to time
                                        relating to the use of personal data included in Your Content, including
                                        (without
                                        limitation) any data protection legislation from time to time in force in New
                                        Zealand
                                        including the Privacy Act 2020 and any successor legislation. You will collect
                                        and
                                        process the personal data of all individuals featured in the Content in
                                        accordance with
                                        all applicable laws, including by obtaining any appropriate consents or
                                        approvals
                                        sufficient for the provision of the Service by ImmiYami.</p>
                                    <p>You are solely responsible for securing and backing up Your Content.</p>
                                    <h4>10.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prohibited Uses - Acceptable Use Policy</h4>
                                    <p>You agree that you will not misuse the Service, ImmiYami Content, or Your
                                        Content. A
                                        misuse constitutes any use, access, or interference with the Service, ImmiYami’s
                                        Content, or Your Content contrary to these Terms, any other individual agreement
                                        executed between You and ImmiYami, and applicable laws and regulations. You will
                                        especially not, without limitation, use the Service, ImmiYami Content, or Your
                                        Content:
                                    </p>
                                    <p><strong>1. In any way that violates any applicable national or international law
                                            or
                                            regulation.</strong></p>
                                    <p><strong>2. For the purpose of exploiting, harming, or attempting to exploit or
                                            harm
                                            minors in any way by exposing them to inappropriate content or
                                            otherwise.</strong>
                                    </p>
                                    <p><strong>3. For the purpose of adult entertainment and/or other incriminating
                                            content.</strong></p>
                                    <h4>11.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Confidential Information</h4>
                                    <p>“Confidential Information” means the specific terms and conditions of the
                                        Agreements and
                                        any non-public technical or business information of a party, including without
                                        limitation any information relating to a party’s techniques, algorithms,
                                        know-how,
                                        current and future products and services, research, engineering, designs,
                                        financial
                                        information, procurement requirements, manufacturing, customer lists, business
                                        forecasts, marketing plans and any other information which is disclosed to the
                                        other
                                        party in any form and (i) which is marked or identified as confidential or
                                        proprietary
                                        at the time of disclosure, or (ii) that the receiving party knows or should
                                        reasonably
                                        know to be the confidential or proprietary information of the disclosing party
                                        given the
                                        nature of such information and the circumstances of its disclosure.</p>
                                    <p>Both ImmiYami and Business Customer will only use the other’s Confidential
                                        Information as
                                        necessary to perform under the Agreements, and must not use or disclose, either
                                        during
                                        or after the termination of its relationship, such information.&nbsp; Both
                                        ImmiYami and
                                        Business Customer (Sponsers) will only disclose the other party’s Confidential
                                        Information to persons or entities who need to know the information to perform
                                        under the
                                        Agreements. These obligations will remain in full force and effect in
                                        perpetuity.</p>
                                    <p>Nothing in the Agreements shall prohibit either ImmiYami or Business Customer
                                        (Sponsor)
                                        from disclosing Confidential Information of the other party if legally required
                                        to do so
                                        by judicial or governmental order (“Required Disclosure”); provided that the
                                        disclosing
                                        party shall: (i) give the other party prompt written notice of such Required
                                        Disclosure
                                        prior to disclosure; (ii) cooperate with the other party in the event the party
                                        elects
                                        to oppose such disclosure or seek a protective order with respect thereto,
                                        and/or (iii)
                                        only disclose the portion of Confidential Information specifically requested by
                                        the
                                        Required Disclosure.</p>
                                    <h4>12.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Analytics</h4>
                                    <p>We may use third-party service providers to monitor and analyse the use of our
                                        Service.
                                    </p>
                                    <p>For additional information on how such third-party service providers may access
                                        Your
                                        personal data, please refer to our Privacy Policy at&nbsp;<a
                                            data-cke-saved-href="https://www.immiyami.com/terms/privacy-policy"
                                            href="https://www.immiyami.com/terms/privacy-policy">https://www.immiyami.com/terms/privacy-policy</a>.
                                    </p>
                                    <h4>13.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Use By Minors</h4>
                                    <p>The Service is intended only for access and use by individuals at least sixteen
                                        (16)
                                        years old.&nbsp;</p>
                                    <p>By accessing or using the Service, You warrant and represent that You are at
                                        least
                                        sixteen (16) years of age and with the full authority, right, and capacity to
                                        enter into
                                        this agreement and abide by all of the terms and conditions of these
                                        Terms.&nbsp;</p>
                                    <p>If You are not at least sixteen (16) years old, You are prohibited from both the
                                        access
                                        and usage of the Service and should immediately stop using the Service.</p>
                                    <h4>14.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accounts</h4>
                                    <p>When You create an account with us, You guarantee that the information You
                                        provide us is
                                        accurate, complete, and current at all times. Inaccurate, incomplete, or
                                        obsolete
                                        information may result in the immediate termination of Your account on the
                                        Service.</p>
                                    <p>You are responsible for maintaining the confidentiality of Your account and
                                        password,
                                        including but not limited to the restriction of access to Your device and/or
                                        account.
                                        You agree to accept responsibility for any and all activities or actions that
                                        occur
                                        under Your account and/or password, whether Your password is with our Service or
                                        a
                                        third-party service. You must notify us immediately upon becoming aware of any
                                        breach of
                                        security or unauthorised use of Your account.</p>
                                    <p>You may not use as a username the name of another person or entity or that is not
                                        lawfully available for use, or a name or trademark that is subject to any rights
                                        of
                                        another person or entity other than You, without appropriate authorisation. You
                                        may not
                                        use as a username any name that is offensive, vulgar or obscene.</p>
                                    <p><br></p>
                                    <h4>15.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Customer Reference</h4>
                                    <p>You agree (i) that ImmiYami may identify You as a recipient of Service and use
                                        Your name
                                        and logo in sales presentations and on the ImmiYami website, and with prior
                                        approval in
                                        marketing materials and press releases, and (ii) with prior approval to develop
                                        a brief
                                        customer profile for promotional purposes on any websites owned and/or
                                        controlled by
                                        ImmiYami.</p>
                                    <h4>16.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Intellectual Property</h4>
                                    <p>The Service and its original content (excluding any Content provided by You or
                                        other
                                        users), features and functionality are and will remain the exclusive property of
                                        Duchy
                                        Global Limited (ImmiYami.com)and its licensors.&nbsp;</p>
                                    <p>The Service is protected by copyright, trademark, and other laws of foreign
                                        countries.
                                        Our trademarks and trade dress may not be used in connection with any product or
                                        service
                                        without our prior written consent.</p>
                                    <h4>17.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Reverse Engineering</h4>
                                    <p>You agree that You will not, at any time, reverse engineer (or attempt to reverse
                                        engineer) any part of the Service or content therein, nor will You permit any
                                        third-party to do so. &nbsp;</p>
                                    <h4>18.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Error Reporting and Feedback</h4>
                                    <p>You may provide us directly at support@immiyami.com with information and feedback
                                        concerning errors, suggestions for improvements, ideas, problems, complaints,
                                        and other
                                        matters related to our Service (“Feedback”).&nbsp;</p>
                                    <p>You acknowledge and agree that: (i) You shall not retain, acquire or assert any
                                        intellectual property rights or other rights, title or interest in or to the
                                        Feedback;
                                        (ii) we may use the Feedback to improve the Service or any other technology;
                                        (iii) we
                                        may have development ideas similar to the Feedback; (iv) the Feedback does not
                                        contain
                                        confidential information or proprietary information from You or any third-party;
                                        and (v)
                                        we are not under any obligation of confidentiality with respect to the
                                        Feedback.&nbsp;
                                    </p>
                                    <p>You hereby grant ImmiYami and its affiliates an exclusive, transferable,
                                        irrevocable,
                                        free-of-charge, royalty-free, sub-licensable, unlimited and perpetual right to
                                        use
                                        (including copy, modify, create derivative works, publish, distribute and
                                        commercialise)
                                        the Feedback in any manner and for any purpose.&zwj;</p>
                                    <h4>19.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Links To Other Web Sites</h4>
                                    <p>Our Service may contain links to third-party web sites or services that are not
                                        owned or
                                        controlled by ImmiYami.</p>
                                    <p>ImmiYami has no control over, and assumes no responsibility for, the content,
                                        privacy
                                        policies or practices of any third-party web sites or services. We do not
                                        warrant the
                                        offerings of any of these entities/individuals or their web sites.</p>
                                    <p>You acknowledge and agree that ImmiYami shall not be responsible or liable,
                                        directly or
                                        indirectly, for any damage or loss caused or alleged to be caused by or in
                                        connection
                                        with use of or reliance on any such content, goods or services available on or
                                        through
                                        any such third-party web sites or services.</p>
                                    <p>We strongly advise You to read the terms of service and privacy policies of any
                                        third-party web sites or services that You visit.</p>
                                    <h4>20.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Disclaimer Of Warranty</h4>
                                    <p>OUR SERVICE AND ANY CONTENT THEREIN ARE PROVIDED BY IMMIYAMI ON AN “AS IS” AND
                                        “AS
                                        AVAILABLE” BASIS. IMMIYAMI MAKES NO REPRESENTATIONS OR WARRANTIES OF ANY KIND,
                                        EXPRESS
                                        OR IMPLIED, AS TO THE OPERATION OF THE SERVICE AND THE INFORMATION, CONTENT OR
                                        MATERIALS
                                        INCLUDED THEREIN. YOU EXPRESSLY AGREE THAT YOUR USE OF THE SERVICE AND ANY
                                        CONTENT
                                        THEREIN IS AT YOUR SOLE RISK.</p>
                                    <p>TO THE EXTENT PERMITTED BY APPLICABLE LAW, IMMIYAMI MAKES NO WARRANTY OR
                                        REPRESENTATION
                                        WITH RESPECT TO THE COMPLETENESS, SECURITY, RELIABILITY, QUALITY, ACCURACY, OR
                                        AVAILABILITY OF THE SERVICE. WITHOUT LIMITING THE FOREGOING, IMMIYAMI DOES NOT
                                        REPRESENT
                                        THAT THE SERVICE, ANY CONTENT THEREIN OR ANY SERVICES OR ITEMS OBTAINED THROUGH
                                        THE
                                        SERVICE WILL BE ACCURATE, RELIABLE, ERROR-FREE OR UNINTERRUPTED, THAT DEFECTS
                                        WILL BE
                                        CORRECTED, THAT THE SERVICES OR THE SERVER THAT MAKES IT AVAILABLE ARE FREE OF
                                        VIRUSES
                                        OR OTHER HARMFUL COMPONENTS OR THAT THE SERVICES OR ANY SERVICES OR ITEMS
                                        OBTAINED
                                        THROUGH THE SERVICES WILL OTHERWISE MEET YOUR NEEDS OR EXPECTATIONS.</p>
                                    <p>THE FOREGOING DOES NOT AFFECT ANY WARRANTIES WHICH CANNOT BE EXCLUDED OR LIMITED
                                        UNDER
                                        APPLICABLE LAW. IN PARTICULAR, IF YOU ARE A CONSUMER AND HAVE YOUR HABITUAL
                                        RESIDENCE IN
                                        THE UK OR THE EUROPEAN ECONOMIC AREA, APPLICABLE CONSUMER LAWS MAY NOT ALLOW
                                        SOME OF THE
                                        EXCLUSIONS AND LIMITATIONS SET OUT ABOVE, SO SOME OR ALL OF THE ABOVE EXCLUSIONS
                                        AND
                                        LIMITATIONS MAY NOT APPLY TO YOU.</p>
                                    <h4>21.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Liability</h4>
                                    <p>TO THE EXTENT PERMITTED BY APPLICABLE LAW, YOU WILL DEFEND, INDEMNIFY AND HOLD
                                        HARMLESS
                                        IMMIYAMI AND ITS OFFICERS, DIRECTORS, EMPLOYEES, AND AGENTS FROM AND AGAINST ANY
                                        AND ALL
                                        LOSSES, DAMAGES, COSTS, EXPENSES (INCLUDING LEGAL FEES), CLAIMS, COMPLAINTS,
                                        DEMANDS,
                                        ACTIONS, SUITS, PROCEEDINGS, OBLIGATIONS AND LIABILITIES ARISING FROM, CONNECTED
                                        WITH OR
                                        RELATING TO YOUR USE OF THE SERVICE OR BREACH OF THESE TERMS. NOTWITHSTANDING
                                        THE
                                        FOREGOING, IMMIYAMI RETAINS THE RIGHT TO PARTICIPATE IN THE DEFENCE OF AND
                                        SETTLEMENT
                                        NEGOTIATIONS RELATING TO ANY THIRD-PARTY CLAIM, COMPLAINT, DEMAND, ACTION, SUIT
                                        OR
                                        PROCEEDING WITH COUNSEL OF OUR OWN SELECTION AT OUR SOLE COST AND EXPENSE.</p>
                                    <p>IN NO EVENT AND UNDER NO CIRCUMSTANCES WILL IMMIYAMI BE LIABLE TO YOU FOR LOSS OF
                                        PROFITS, SALES, BUSINESS, OR REVENUE, BUSINESS INTERRUPTION, LOSS OF ANTICIPATED
                                        SAVINGS, LOSS OF BUSINESS OPPORTUNITY, LOSS OF GOODWILL OR REPUTATION, OR ANY
                                        DESAPOINTMENTS REGADING THE GOALS NOT ACHIEVING OR ANY INDIRECT OR CONSEQUENTIAL
                                        DAMAGE
                                        RESULTING FROM YOUR USE OF THE SERVICE OR ANY CONTENT THEREIN.</p>
                                    <h4>22.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Termination</h4>
                                    <p>We may terminate or suspend Your account and/or prevent Your access to the
                                        Service
                                        immediately, without prior notice in the event You are in breach of these Terms.
                                    </p>
                                    <p>You are free to stop using the Service at any time. If You wish to terminate your
                                        account, please contact us. Termination of Your account will take effect at the
                                        end of
                                        the then current Billing Cycle and will not give rise to any refund of Your
                                        Purchase,
                                        unless as described under “8. Refund”.</p>
                                    <p>All provisions of these Terms which by their nature should survive termination
                                        shall
                                        survive termination, including, without limitation, ownership provisions,
                                        warranty
                                        disclaimers, indemnity and limitations of liability.</p>
                                    <h4>23.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Governing Law</h4>
                                    <p>The Agreements and any dispute or claim (including non-contractual disputes or
                                        claims)
                                        arising out of or in connection with it or its subject matter or formation are
                                        governed
                                        by New Zealand Law. The New Zealand Courts will have exclusive jurisdiction to
                                        deal with
                                        any dispute (including any non-contractual claim or dispute) which has arisen or
                                        may
                                        arise out of, or in connection with, the Agreements.</p>
                                    <p>If you are a Consumer and have your habitual residence in New Zealand &nbsp;you
                                        may
                                        benefit from additional rights and protection afforded to you by mandatory
                                        provisions of
                                        the laws of your country of residence, and nothing in these Terms shall affect
                                        the
                                        enforceability of these additional rights and protection.</p>
                                    <h4>24.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Changes To Service</h4>
                                    <p>We reserve the right to withdraw or amend our Service, and any service or
                                        material we
                                        provide via the Service, in our sole discretion without notice. We will not be
                                        liable if
                                        for any reason all or any part of the Service is unavailable at any time or for
                                        any
                                        period. From time to time, we may restrict access to some parts of Service, or
                                        the
                                        entire Service, to users, including registered users.</p>
                                    <h4>25.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amendments To Terms</h4>
                                    <p>We may amend these Terms at any time by posting the amended Terms on this site.
                                        It is
                                        Your responsibility to review these Terms periodically. These terms become
                                        effective
                                        immediately upon posting, unless You have an active Subscription in which case
                                        the
                                        revised Terms will become effective thirty (30) days after posting. If any
                                        revision to
                                        these Terms has a material impact on Your rights or obligations, we may notify
                                        You of
                                        such revision using Your registered e-mail address.</p>
                                    <p>By continuing to access or use our Service after any revisions become effective,
                                        You
                                        agree to be bound by the revised Terms. If You do not agree to the revised
                                        Terms, You
                                        are no longer authorised to use Service.</p>
                                    <h4>26.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Waiver</h4>
                                    <p>No waiver by ImmiYami of any term or condition set forth in these Terms shall be
                                        deemed a
                                        further or continuing waiver of such term or condition or a waiver of any other
                                        term or
                                        condition, and any failure of ImmiYami to assert a right or provision under
                                        these Terms
                                        shall not constitute a waiver of such right or provision.</p>
                                    <h4>27.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Severability</h4>
                                    <p>If any provision of these Terms is held by a court or other tribunal of competent
                                        jurisdiction to be invalid, illegal or unenforceable for any reason, such
                                        provision
                                        shall be eliminated or limited to the minimum extent such that the remaining
                                        provisions
                                        of these Terms will continue in full force and effect.</p>
                                    <h4>28.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assignment</h4>
                                    <p>We may transfer our rights and obligations under these Terms to another
                                        organisation. We
                                        will always tell You in writing if this happens and we will ensure that the
                                        transfer
                                        will not affect Your rights.</p>
                                    <p>You may not transfer any of Your rights and obligations under these Terms to any
                                        other
                                        person without our prior express written consent.</p>
                                    <h4>29.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Acknowledgement<br></h4>
                                    <p>IMMIYAMI.COM IS NOT ACTING AS AN IMMIGRATION AGENT/LAWYER/ADVICER. IMMIYAMI IS A
                                        COMMAN
                                        PLATFORM WHERE IMMGRATION SEEKERS AND IMMIGRATION SERVICE PROVIDERS MEET EACH
                                        OTHER.</p>
                                    <p>BY USING THE SERVICE OR OTHER SERVICES PROVIDED BY US, </p>
                                    <p>YOU ACKNOWLEDGE THAT YOU HAVE READ THESE TERMS AND AGREE TO BE BOUND BY THEM.</p>
                                    <h4>30.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Us</h4>
                                    <p>The Service is operated by Duchy Global Limited. Our registered address is 15C,
                                        Manning
                                        Street, Hamilton Central, Hamilton, New Zealand, 3204.</p>
                                    <p>Please send Your feedback, comments, requests for technical support by email at:
                                        support@immiyami.com.<br></p>

                                    <hr>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" required class="custom-control-input" id="signup-check">
                                <label class="custom-control-label" for="signup-check">I agree to the all <a
                                        href="/pages/terms-conditions">terms & conditions</a> of ImmiYami.</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-inline reg-btn-subM reg-btn-sub-d">
                                <i class="fas fa-user-check"></i>
                                <span>Create new account</span>
                            </button>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12">
                        <h6 class="linetrue"><span>OR</span></h6>
                    </div>

                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <!-- <div class="g-signin2" data-onsuccess="onSignIn"></div> -->
                            <div id="g_id_onload"
                                data-client_id="310320071786-0nvd1db0bs2cctq6gv4s6m4u9iu6phe3.apps.googleusercontent.com"
                                data-context="signin" data-ux_mode="popup" data-callback="handleCredentialResponse"
                                data-auto_prompt="true">
                            </div>

                            <div class="g_id_signin" data-type="standard" data-shape="rectangular" data-theme="outline"
                                data-text="signin_with" data-size="medium" data-logo_alignment="left">
                            </div>


                        </div>
                    </div>
                    <!-- <div class="col-xs-6 col-sm-6">
                        <div class="fb-login-button" onclick="login()" data-size="medium" data-width="100%" data-size=""
                            data-button-type="" data-layout="" data-auto-logout-link="false"
                            data-use-continue-as="false"></div>
                    </div> -->
                </div>
                <?= $this->Form->end() ?>
                <?= $this->Form->create(NULL,['url' => '/Users/register','id'=>'regSupplier']) ?>
                <div class="row supplier">
                    <input type="hidden" class="form-check-input  form-control" name="role" value="supplier">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control first_name"
                                onkeydown="return /[a-z]/i.test(event.key)" name="first_name" placeholder="First Name *"
                                required>
                            <small class="form-alert">Enter your first name here</small>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control last_name"
                                onkeydown="return /[a-z]/i.test(event.key)" name="last_name" required
                                placeholder="Last Name *">
                            <small class="form-alert">Enter your last name here</small>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <input type="text" class="form-control " name="company_name" required
                                placeholder="Company Name *">
                            <small class="form-alert">Enter your company name here</small>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <small>Select your service Country *</small>
                            <? echo $this->Form->control('Countries._ids', ['label'=>false,'id'=>'countryId','multiple'=>true,'required'=>true,'options' => $countries, 'empty' => true,'class'=>'multi-select wide form-control']); ?>
                            <small class="form-alert">Pick your countries</small>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <small>Contact Number *</small>
                            <input type="tel" class="form-control" onkeypress='validateTP(event)' name="contact"
                                required id="phone2">

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <input type="email" class="form-control email" name="email" required id="supplierMail"
                                placeholder="Email Address *">
                            <small class="form-alert">Please follow this example - XXXX@XXXX.XXX</small>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <? echo $this->Form->control('category_id', ['label'=>false,'options' => $categories, 'empty' => true,'class'=>'multi-select wide form-control','empty' => 'Category *']); ?>
                            <small class="form-alert">Pick your category</small>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="q" value="1" id="q-check1">
                                <label class="custom-control-label" for="q-check1">List me to conversation with members
                                    <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom"
                                        title="Would you prefer to be a service provider who can offer a 10 minutes free consultation for a new member ( immigration seeker)"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <input type="password" pattern=".{6,}" class="form-control" required name="password"
                                id="passS" placeholder="Password *">
                            <button class="form-icon" type="button"><i class="eyeS fas fa-eye"></i></button>
                            <small class="form-alert">Password must be 6 characters</small>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <input type="password" pattern=".{6,}" class="form-control" required name="c_password"
                                id="passSC" placeholder="Repeat Password *">
                            <button class="form-icon" type="button"><i class="eyeSC fas fa-eye"></i></button>
                            <small class="form-alert">Password must be 6 characters</small>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group readmoreser">
                            <div class="readmorecond">

                                <h3><strong>Terms of Service</strong></h1>
                                    <p><em>Published on March 26th, 2022</em></p>
                                    <h4>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Introduction</h4>
                                    <p>Welcome to&nbsp;ImmiYami&nbsp;(“ImmiYami”, “we”, “our”, “us”)! As You have just
                                        arrived
                                        at our Terms of Service, please pause, grab a cup of coffee and carefully read
                                        the
                                        following pages. It will take You approximately 20 minutes.</p>
                                    <p>“ImmiYami” is the trading name of Duchy Global Limited (New Zealand Company)
                                        along with
                                        their respective directors, officers, employees, licensees, contractors,
                                        attorneys,
                                        agents, successors and assigns.</p>
                                    <p>IMMIYAMI.COM IS NOT ACTING AS AN IMMIGRATION AGENT/LAWYER/ADVICER. IMMIYAMI IS A
                                        COMMON
                                        PLATFORM WHERE IMMGRATION SEEKERS AND IMMIGRATION SERVICE PROVIDERS MEET EACH
                                        OTHER.</p>
                                    <p>&nbsp;“You” or “Your” is either: i) a registered business that wish to or already
                                        purchases any product or service made available through the Service incl. the
                                        business’
                                        respective directors, officers, employees, licensees, contractors, attorneys,
                                        agents,
                                        successors and assigns (“Business Customer”); or ii) a private individual that
                                        wish to
                                        or already purchases any products or service made available through the Service
                                        (“Consumer”).</p>
                                    <p>Our Privacy Policy also governs Your use of our Service and explains how we
                                        collect,
                                        safeguard and disclose information that results from Your use of our web pages.
                                        Please
                                        read it <a href="https://www.immiyami.com/pages/privacy-policy" target="_blank"
                                            rel="noopener noreferrer">https://www.immiyami.com/pages/privacy-policy</a>
                                        . If you are a Business
                                        Customer
                                        we act from a position of a “data processor” for any personal data you provide
                                        us that
                                        relates to private individuals, and our role, together with the security
                                        measures we
                                        apply, is detailed in the DPA.</p>
                                    <p>Your agreement with us includes these Terms, our Privacy Policy, and, where
                                        applicable,
                                        the DPA (“Agreements”). You acknowledge that You have read and understood the
                                        Agreements, and agree to be bound by them.</p>
                                    <p>If You do not agree with (or cannot comply with) the Agreements, then You may not
                                        use
                                        (and must immediately stop using) the Service, but please let us know by
                                        emailing at
                                        support@immiyami.com so we can try to find a solution. These Terms apply to all
                                        visitors, users and others who wish to access or use Service.</p>
                                    <p>Thank You for being responsible.</p>
                                    <h4>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Communications</h4>
                                    <p>When creating an account on our Service, You will be asked to select marketing
                                        preferences which allow You to subscribe to newsletters, marketing or
                                        promotional
                                        materials and other information we may send.&nbsp;</p>
                                    <p>You may opt out of receiving any, or all, of these communications from us by
                                        accessing
                                        Your Account Settings on the Service, or by following the unsubscribe link at
                                        the bottom
                                        of each of our marketing communications.</p>
                                    <p>For additional information about how we protect Your privacy, please refer to our
                                        Privacy
                                        Policy at&nbsp;<a href="https://www.immiyami.com/pages/privacy-policy"
                                            target="_blank"
                                            rel="noopener noreferrer">https://www.immiyami.com/pages/privacy-policy</a>
                                    </p>
                                    <h4>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Purchases and Membership</h4>
                                    <p>If You wish to purchase any product, service or membership made available through
                                        the
                                        Service (“Purchase”), You may be asked to supply certain information relevant to
                                        Your
                                        Purchase including, without limitation, Your credit card number, the expiration
                                        date of
                                        Your credit card, Your billing address, and Your shipping information.</p>
                                    <p>You represent and warrant that: (i) You have the legal right to use any credit
                                        card(s) or
                                        other payment method(s) in connection with any Purchase; and (ii) the
                                        information You
                                        supply to us is true, correct and complete.</p>
                                    <p>We may employ the use of third-party services for the purpose of facilitating
                                        payment and
                                        the completion of Purchases. By submitting Your payment information, You
                                        understand that
                                        we may share that information with these third parties subject to our Privacy
                                        Policy.
                                    </p>
                                    <p>Your Purchase is not confirmed until You receive a confirmation email from us. In
                                        particular, we reserve the right to reject Your Purchase due to product or
                                        service
                                        unavailability, or if fraud or an unauthorized or illegal transaction is
                                        suspected.</p>
                                    <p>All prices shown on the Service are as a standard denominated in USD. We may
                                        determine to
                                        show the prices in the currency that ImmiYami determines to be your local
                                        currency. All
                                        prices shown to Consumers include applicable sales taxes at the rate that is in
                                        force
                                        from time to time.</p>
                                    <h4>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contests, Sweepstakes and Promotions</h4>
                                    <p>Any contests, sweepstakes or other promotions (collectively, “Promotions”) made
                                        available
                                        through the Service may be governed by rules that are separate from these Terms.
                                        If You
                                        participate in any Promotions, please review the applicable rules as well as our
                                        Privacy
                                        Policy. If the rules for a Promotion conflict with these Terms, the rules
                                        governing the
                                        Promotion will prevail.</p>
                                    <h4>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subscriptions / Membership / Payments</h4>
                                    <p>Some parts of the Service are subject to payments. Paid Services are usually
                                        provided on
                                        a recurring subscription or membership basis (“Subscription(s)”(Membership(s)),
                                        but we
                                        may also provide them on a fixed-term basis (“Fixed Term”). Fixed Term Services
                                        are paid
                                        against the invoice according to the payment terms agreed separately
                                        (Advertistment(s))
                                        and classified(s)). Unless otherwise agreed, Subscription and membership payment
                                        terms
                                        shall not apply to Fixed Term Services. If you are interested in Fixed Term
                                        Services,
                                        please contact us. Subscriptions are billed in advance on a recurring and
                                        periodic basis
                                        (“Billing Cycle”). The relevant Billing Cycle will be displayed to You at
                                        check-out, on
                                        Your quote or on Your invoice.</p>
                                    <p>At the end of each Billing Cycle, Your Subscription will automatically renew
                                        under the
                                        exact same conditions unless You cancel it or ImmiYami cancels it. If Your
                                        Subscription
                                        is on an annual basis, we will let You know at least thirty (30) days in advance
                                        of any
                                        automatic renewal in order to give You the opportunity to cancel your
                                        Subscription. You
                                        may cancel Your Subscription renewal either through Your online account
                                        management page
                                        or by contacting our customer support team.</p>
                                    <p>A valid payment method, including credit card, is required to process the payment
                                        for
                                        Your Subscription. You shall provide ImmiYami with accurate and complete billing
                                        information including full name, address, state, zip code, telephone number, GST
                                        number
                                        (if applicable) and a valid payment method information. By submitting such
                                        payment
                                        information, You automatically authorise ImmiYami to charge all Subscription
                                        fees
                                        incurred through Your account to any such payment instruments.</p>
                                    <p>Should automatic billing fail to occur for any reason, ImmiYami may (but does not
                                        have an
                                        obligation to) issue an electronic invoice indicating that You must proceed
                                        manually,
                                        within a certain deadline date, with the full payment corresponding to the
                                        billing
                                        period as indicated on the invoice.</p>
                                    <p>We reserve the right to terminate Your Subscription in the event we are unable to
                                        collect
                                        a relevant payment from You (whether automatically or manually). Where that
                                        happens, we
                                        will inform You of the termination of Your Subscription via email.</p>
                                    <h4>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Free Trial</h4>
                                    <p>We may, at our sole discretion, offer a Subscription with a free trial for a
                                        limited
                                        period of time (“Free Trial”).</p>
                                    <p>You may be required to enter Your billing information in order to sign up for a
                                        Free
                                        Trial. If You do enter Your billing information when signing up for Free Trial,
                                        You will
                                        not be charged by ImmiYami until your Free Trial has expired. On the last day of
                                        the
                                        Free Membership/Subscription/ Fees period, unless You cancelled Your Membership
                                        /
                                        Subscription/Fees, You will be automatically charged the applicable Subscription
                                        fees
                                        for the type of Subscription You have selected.</p>
                                    <h4>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fee Changes</h4>
                                    <p>ImmiYami, in its sole discretion and at any time, may modify advertising and
                                        classified
                                        fees for the future payments. We will inform You of any change to Your
                                        advertising fees
                                        at least thirty (30) days in advance to give You an opportunity to renew your
                                        contract
                                        before such change becomes effective. Any Subscription fee change will become
                                        effective
                                        on the earlier of the expiry of that thirty (30)-day period, or at the end of
                                        the
                                        then-current Billing Cycle, whichever is earlier.</p>
                                    <p>Your continued use of a Subscription after a Subscription fee change comes into
                                        effect
                                        constitutes Your agreement to pay the revised Subscription fee amount.</p>
                                    <h4>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Refunds</h4>
                                    <p>If you make any Purchase on the Service as a Consumer/Member, you have the right
                                        to
                                        request a refund of the applicable Purchase price without providing a reason at
                                        any time
                                        within seven (07) days of the original date of purchase. As your Purchase can be
                                        used by
                                        you immediately, we reserve the right to only issue a pro-rated refund which
                                        reflects
                                        the amount of time you have enjoyed the Purchase before claiming a refund.</p>
                                    <p>To request a refund (or partial refund), please contact us by using the contact
                                        details
                                        at the bottom of these Terms. We will issue any refund as soon as possible to
                                        the
                                        payment method used for the original Purchase.</p>
                                    <p>Refunds do not apply to Business Customers (Sponsors).</p>
                                    <h4>9.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Content</h4>
                                    <p>Our Service allows You to post, link, store, share and otherwise make available
                                        certain
                                        information, text, graphics, videos, or other material. (together, Your
                                        “Content”).&nbsp;</p>
                                    <p>You are responsible for Content that You post on through the Service, including
                                        its
                                        legality, reliability, and appropriateness.</p>
                                    <p>By posting or creating Content on or through the Service, You represent and
                                        warrant that:
                                        (i) Content is Yours (You own it) and/or You have the right to use it and the
                                        right to
                                        grant us the rights and licence as provided in these Terms, and (ii) the posting
                                        of Your
                                        Content on or through the Service does not violate the privacy rights, publicity
                                        rights,
                                        copyrights, contract rights, intellectual property rights or any other rights of
                                        any
                                        person or entity. We reserve the right to terminate Your account in the event
                                        You
                                        infringe this provision.</p>
                                    <p>You retain any and all of Your rights to any Content You submit, post, display or
                                        create
                                        on or through the Service and You are responsible for protecting those rights.
                                        We take
                                        no responsibility and assume no liability for Content You post or create on or
                                        through
                                        the Service. &nbsp;</p>
                                    <p>ImmiYami has the right but not the obligation to monitor and edit all Content
                                        submitted
                                        by users on the Service.&nbsp;</p>
                                    <p>By uploading through the Service, You grant ImmiYami a free of charge,
                                        non-exclusive,
                                        perpetual, transferable, royalty-free, irrevocable, worldwide licence to: (i)
                                        deliver
                                        the Service to You; and (ii) use the Content for internal research and
                                        development
                                        and/or to improve the Service. Where Content includes personal information about
                                        private
                                        individuals this will be further regulated by our Privacy Policy, DPA, or other
                                        individual agreement.&nbsp;</p>
                                    <p>You shall ensure that Your Content complies with, and assist ImmiYami to comply
                                        with, the
                                        requirements of all legislation and regulatory requirements in force from time
                                        to time
                                        relating to the use of personal data included in Your Content, including
                                        (without
                                        limitation) any data protection legislation from time to time in force in New
                                        Zealand
                                        including the Privacy Act 2020 and any successor legislation. You will collect
                                        and
                                        process the personal data of all individuals featured in the Content in
                                        accordance with
                                        all applicable laws, including by obtaining any appropriate consents or
                                        approvals
                                        sufficient for the provision of the Service by ImmiYami.</p>
                                    <p>You are solely responsible for securing and backing up Your Content.</p>
                                    <h4>10.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prohibited Uses - Acceptable Use Policy</h4>
                                    <p>You agree that you will not misuse the Service, ImmiYami Content, or Your
                                        Content. A
                                        misuse constitutes any use, access, or interference with the Service, ImmiYami’s
                                        Content, or Your Content contrary to these Terms, any other individual agreement
                                        executed between You and ImmiYami, and applicable laws and regulations. You will
                                        especially not, without limitation, use the Service, ImmiYami Content, or Your
                                        Content:
                                    </p>
                                    <p><strong>1. In any way that violates any applicable national or international law
                                            or
                                            regulation.</strong></p>
                                    <p><strong>2. For the purpose of exploiting, harming, or attempting to exploit or
                                            harm
                                            minors in any way by exposing them to inappropriate content or
                                            otherwise.</strong>
                                    </p>
                                    <p><strong>3. For the purpose of adult entertainment and/or other incriminating
                                            content.</strong></p>
                                    <h4>11.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Confidential Information</h4>
                                    <p>“Confidential Information” means the specific terms and conditions of the
                                        Agreements and
                                        any non-public technical or business information of a party, including without
                                        limitation any information relating to a party’s techniques, algorithms,
                                        know-how,
                                        current and future products and services, research, engineering, designs,
                                        financial
                                        information, procurement requirements, manufacturing, customer lists, business
                                        forecasts, marketing plans and any other information which is disclosed to the
                                        other
                                        party in any form and (i) which is marked or identified as confidential or
                                        proprietary
                                        at the time of disclosure, or (ii) that the receiving party knows or should
                                        reasonably
                                        know to be the confidential or proprietary information of the disclosing party
                                        given the
                                        nature of such information and the circumstances of its disclosure.</p>
                                    <p>Both ImmiYami and Business Customer will only use the other’s Confidential
                                        Information as
                                        necessary to perform under the Agreements, and must not use or disclose, either
                                        during
                                        or after the termination of its relationship, such information.&nbsp; Both
                                        ImmiYami and
                                        Business Customer (Sponsers) will only disclose the other party’s Confidential
                                        Information to persons or entities who need to know the information to perform
                                        under the
                                        Agreements. These obligations will remain in full force and effect in
                                        perpetuity.</p>
                                    <p>Nothing in the Agreements shall prohibit either ImmiYami or Business Customer
                                        (Sponsor)
                                        from disclosing Confidential Information of the other party if legally required
                                        to do so
                                        by judicial or governmental order (“Required Disclosure”); provided that the
                                        disclosing
                                        party shall: (i) give the other party prompt written notice of such Required
                                        Disclosure
                                        prior to disclosure; (ii) cooperate with the other party in the event the party
                                        elects
                                        to oppose such disclosure or seek a protective order with respect thereto,
                                        and/or (iii)
                                        only disclose the portion of Confidential Information specifically requested by
                                        the
                                        Required Disclosure.</p>
                                    <h4>12.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Analytics</h4>
                                    <p>We may use third-party service providers to monitor and analyse the use of our
                                        Service.
                                    </p>
                                    <p>For additional information on how such third-party service providers may access
                                        Your
                                        personal data, please refer to our Privacy Policy at&nbsp;<a
                                            data-cke-saved-href="https://www.immiyami.com/terms/privacy-policy"
                                            href="https://www.immiyami.com/terms/privacy-policy">https://www.immiyami.com/terms/privacy-policy</a>.
                                    </p>
                                    <h4>13.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Use By Minors</h4>
                                    <p>The Service is intended only for access and use by individuals at least sixteen
                                        (16)
                                        years old.&nbsp;</p>
                                    <p>By accessing or using the Service, You warrant and represent that You are at
                                        least
                                        sixteen (16) years of age and with the full authority, right, and capacity to
                                        enter into
                                        this agreement and abide by all of the terms and conditions of these
                                        Terms.&nbsp;</p>
                                    <p>If You are not at least sixteen (16) years old, You are prohibited from both the
                                        access
                                        and usage of the Service and should immediately stop using the Service.</p>
                                    <h4>14.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accounts</h4>
                                    <p>When You create an account with us, You guarantee that the information You
                                        provide us is
                                        accurate, complete, and current at all times. Inaccurate, incomplete, or
                                        obsolete
                                        information may result in the immediate termination of Your account on the
                                        Service.</p>
                                    <p>You are responsible for maintaining the confidentiality of Your account and
                                        password,
                                        including but not limited to the restriction of access to Your device and/or
                                        account.
                                        You agree to accept responsibility for any and all activities or actions that
                                        occur
                                        under Your account and/or password, whether Your password is with our Service or
                                        a
                                        third-party service. You must notify us immediately upon becoming aware of any
                                        breach of
                                        security or unauthorised use of Your account.</p>
                                    <p>You may not use as a username the name of another person or entity or that is not
                                        lawfully available for use, or a name or trademark that is subject to any rights
                                        of
                                        another person or entity other than You, without appropriate authorisation. You
                                        may not
                                        use as a username any name that is offensive, vulgar or obscene.</p>
                                    <p><br></p>
                                    <h4>15.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Customer Reference</h4>
                                    <p>You agree (i) that ImmiYami may identify You as a recipient of Service and use
                                        Your name
                                        and logo in sales presentations and on the ImmiYami website, and with prior
                                        approval in
                                        marketing materials and press releases, and (ii) with prior approval to develop
                                        a brief
                                        customer profile for promotional purposes on any websites owned and/or
                                        controlled by
                                        ImmiYami.</p>
                                    <h4>16.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Intellectual Property</h4>
                                    <p>The Service and its original content (excluding any Content provided by You or
                                        other
                                        users), features and functionality are and will remain the exclusive property of
                                        Duchy
                                        Global Limited (ImmiYami.com)and its licensors.&nbsp;</p>
                                    <p>The Service is protected by copyright, trademark, and other laws of foreign
                                        countries.
                                        Our trademarks and trade dress may not be used in connection with any product or
                                        service
                                        without our prior written consent.</p>
                                    <h4>17.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Reverse Engineering</h4>
                                    <p>You agree that You will not, at any time, reverse engineer (or attempt to reverse
                                        engineer) any part of the Service or content therein, nor will You permit any
                                        third-party to do so. &nbsp;</p>
                                    <h4>18.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Error Reporting and Feedback</h4>
                                    <p>You may provide us directly at support@immiyami.com with information and feedback
                                        concerning errors, suggestions for improvements, ideas, problems, complaints,
                                        and other
                                        matters related to our Service (“Feedback”).&nbsp;</p>
                                    <p>You acknowledge and agree that: (i) You shall not retain, acquire or assert any
                                        intellectual property rights or other rights, title or interest in or to the
                                        Feedback;
                                        (ii) we may use the Feedback to improve the Service or any other technology;
                                        (iii) we
                                        may have development ideas similar to the Feedback; (iv) the Feedback does not
                                        contain
                                        confidential information or proprietary information from You or any third-party;
                                        and (v)
                                        we are not under any obligation of confidentiality with respect to the
                                        Feedback.&nbsp;
                                    </p>
                                    <p>You hereby grant ImmiYami and its affiliates an exclusive, transferable,
                                        irrevocable,
                                        free-of-charge, royalty-free, sub-licensable, unlimited and perpetual right to
                                        use
                                        (including copy, modify, create derivative works, publish, distribute and
                                        commercialise)
                                        the Feedback in any manner and for any purpose.&zwj;</p>
                                    <h4>19.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Links To Other Web Sites</h4>
                                    <p>Our Service may contain links to third-party web sites or services that are not
                                        owned or
                                        controlled by ImmiYami.</p>
                                    <p>ImmiYami has no control over, and assumes no responsibility for, the content,
                                        privacy
                                        policies or practices of any third-party web sites or services. We do not
                                        warrant the
                                        offerings of any of these entities/individuals or their web sites.</p>
                                    <p>You acknowledge and agree that ImmiYami shall not be responsible or liable,
                                        directly or
                                        indirectly, for any damage or loss caused or alleged to be caused by or in
                                        connection
                                        with use of or reliance on any such content, goods or services available on or
                                        through
                                        any such third-party web sites or services.</p>
                                    <p>We strongly advise You to read the terms of service and privacy policies of any
                                        third-party web sites or services that You visit.</p>
                                    <h4>20.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Disclaimer Of Warranty</h4>
                                    <p>OUR SERVICE AND ANY CONTENT THEREIN ARE PROVIDED BY IMMIYAMI ON AN “AS IS” AND
                                        “AS
                                        AVAILABLE” BASIS. IMMIYAMI MAKES NO REPRESENTATIONS OR WARRANTIES OF ANY KIND,
                                        EXPRESS
                                        OR IMPLIED, AS TO THE OPERATION OF THE SERVICE AND THE INFORMATION, CONTENT OR
                                        MATERIALS
                                        INCLUDED THEREIN. YOU EXPRESSLY AGREE THAT YOUR USE OF THE SERVICE AND ANY
                                        CONTENT
                                        THEREIN IS AT YOUR SOLE RISK.</p>
                                    <p>TO THE EXTENT PERMITTED BY APPLICABLE LAW, IMMIYAMI MAKES NO WARRANTY OR
                                        REPRESENTATION
                                        WITH RESPECT TO THE COMPLETENESS, SECURITY, RELIABILITY, QUALITY, ACCURACY, OR
                                        AVAILABILITY OF THE SERVICE. WITHOUT LIMITING THE FOREGOING, IMMIYAMI DOES NOT
                                        REPRESENT
                                        THAT THE SERVICE, ANY CONTENT THEREIN OR ANY SERVICES OR ITEMS OBTAINED THROUGH
                                        THE
                                        SERVICE WILL BE ACCURATE, RELIABLE, ERROR-FREE OR UNINTERRUPTED, THAT DEFECTS
                                        WILL BE
                                        CORRECTED, THAT THE SERVICES OR THE SERVER THAT MAKES IT AVAILABLE ARE FREE OF
                                        VIRUSES
                                        OR OTHER HARMFUL COMPONENTS OR THAT THE SERVICES OR ANY SERVICES OR ITEMS
                                        OBTAINED
                                        THROUGH THE SERVICES WILL OTHERWISE MEET YOUR NEEDS OR EXPECTATIONS.</p>
                                    <p>THE FOREGOING DOES NOT AFFECT ANY WARRANTIES WHICH CANNOT BE EXCLUDED OR LIMITED
                                        UNDER
                                        APPLICABLE LAW. IN PARTICULAR, IF YOU ARE A CONSUMER AND HAVE YOUR HABITUAL
                                        RESIDENCE IN
                                        THE UK OR THE EUROPEAN ECONOMIC AREA, APPLICABLE CONSUMER LAWS MAY NOT ALLOW
                                        SOME OF THE
                                        EXCLUSIONS AND LIMITATIONS SET OUT ABOVE, SO SOME OR ALL OF THE ABOVE EXCLUSIONS
                                        AND
                                        LIMITATIONS MAY NOT APPLY TO YOU.</p>
                                    <h4>21.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Liability</h4>
                                    <p>TO THE EXTENT PERMITTED BY APPLICABLE LAW, YOU WILL DEFEND, INDEMNIFY AND HOLD
                                        HARMLESS
                                        IMMIYAMI AND ITS OFFICERS, DIRECTORS, EMPLOYEES, AND AGENTS FROM AND AGAINST ANY
                                        AND ALL
                                        LOSSES, DAMAGES, COSTS, EXPENSES (INCLUDING LEGAL FEES), CLAIMS, COMPLAINTS,
                                        DEMANDS,
                                        ACTIONS, SUITS, PROCEEDINGS, OBLIGATIONS AND LIABILITIES ARISING FROM, CONNECTED
                                        WITH OR
                                        RELATING TO YOUR USE OF THE SERVICE OR BREACH OF THESE TERMS. NOTWITHSTANDING
                                        THE
                                        FOREGOING, IMMIYAMI RETAINS THE RIGHT TO PARTICIPATE IN THE DEFENCE OF AND
                                        SETTLEMENT
                                        NEGOTIATIONS RELATING TO ANY THIRD-PARTY CLAIM, COMPLAINT, DEMAND, ACTION, SUIT
                                        OR
                                        PROCEEDING WITH COUNSEL OF OUR OWN SELECTION AT OUR SOLE COST AND EXPENSE.</p>
                                    <p>IN NO EVENT AND UNDER NO CIRCUMSTANCES WILL IMMIYAMI BE LIABLE TO YOU FOR LOSS OF
                                        PROFITS, SALES, BUSINESS, OR REVENUE, BUSINESS INTERRUPTION, LOSS OF ANTICIPATED
                                        SAVINGS, LOSS OF BUSINESS OPPORTUNITY, LOSS OF GOODWILL OR REPUTATION, OR ANY
                                        DESAPOINTMENTS REGADING THE GOALS NOT ACHIEVING OR ANY INDIRECT OR CONSEQUENTIAL
                                        DAMAGE
                                        RESULTING FROM YOUR USE OF THE SERVICE OR ANY CONTENT THEREIN.</p>
                                    <h4>22.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Termination</h4>
                                    <p>We may terminate or suspend Your account and/or prevent Your access to the
                                        Service
                                        immediately, without prior notice in the event You are in breach of these Terms.
                                    </p>
                                    <p>You are free to stop using the Service at any time. If You wish to terminate your
                                        account, please contact us. Termination of Your account will take effect at the
                                        end of
                                        the then current Billing Cycle and will not give rise to any refund of Your
                                        Purchase,
                                        unless as described under “8. Refund”.</p>
                                    <p>All provisions of these Terms which by their nature should survive termination
                                        shall
                                        survive termination, including, without limitation, ownership provisions,
                                        warranty
                                        disclaimers, indemnity and limitations of liability.</p>
                                    <h4>23.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Governing Law</h4>
                                    <p>The Agreements and any dispute or claim (including non-contractual disputes or
                                        claims)
                                        arising out of or in connection with it or its subject matter or formation are
                                        governed
                                        by New Zealand Law. The New Zealand Courts will have exclusive jurisdiction to
                                        deal with
                                        any dispute (including any non-contractual claim or dispute) which has arisen or
                                        may
                                        arise out of, or in connection with, the Agreements.</p>
                                    <p>If you are a Consumer and have your habitual residence in New Zealand &nbsp;you
                                        may
                                        benefit from additional rights and protection afforded to you by mandatory
                                        provisions of
                                        the laws of your country of residence, and nothing in these Terms shall affect
                                        the
                                        enforceability of these additional rights and protection.</p>
                                    <h4>24.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Changes To Service</h4>
                                    <p>We reserve the right to withdraw or amend our Service, and any service or
                                        material we
                                        provide via the Service, in our sole discretion without notice. We will not be
                                        liable if
                                        for any reason all or any part of the Service is unavailable at any time or for
                                        any
                                        period. From time to time, we may restrict access to some parts of Service, or
                                        the
                                        entire Service, to users, including registered users.</p>
                                    <h4>25.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amendments To Terms</h4>
                                    <p>We may amend these Terms at any time by posting the amended Terms on this site.
                                        It is
                                        Your responsibility to review these Terms periodically. These terms become
                                        effective
                                        immediately upon posting, unless You have an active Subscription in which case
                                        the
                                        revised Terms will become effective thirty (30) days after posting. If any
                                        revision to
                                        these Terms has a material impact on Your rights or obligations, we may notify
                                        You of
                                        such revision using Your registered e-mail address.</p>
                                    <p>By continuing to access or use our Service after any revisions become effective,
                                        You
                                        agree to be bound by the revised Terms. If You do not agree to the revised
                                        Terms, You
                                        are no longer authorised to use Service.</p>
                                    <h4>26.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Waiver</h4>
                                    <p>No waiver by ImmiYami of any term or condition set forth in these Terms shall be
                                        deemed a
                                        further or continuing waiver of such term or condition or a waiver of any other
                                        term or
                                        condition, and any failure of ImmiYami to assert a right or provision under
                                        these Terms
                                        shall not constitute a waiver of such right or provision.</p>
                                    <h4>27.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Severability</h4>
                                    <p>If any provision of these Terms is held by a court or other tribunal of competent
                                        jurisdiction to be invalid, illegal or unenforceable for any reason, such
                                        provision
                                        shall be eliminated or limited to the minimum extent such that the remaining
                                        provisions
                                        of these Terms will continue in full force and effect.</p>
                                    <h4>28.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assignment</h4>
                                    <p>We may transfer our rights and obligations under these Terms to another
                                        organisation. We
                                        will always tell You in writing if this happens and we will ensure that the
                                        transfer
                                        will not affect Your rights.</p>
                                    <p>You may not transfer any of Your rights and obligations under these Terms to any
                                        other
                                        person without our prior express written consent.</p>
                                    <h4>29.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Acknowledgement<br></h4>
                                    <p>IMMIYAMI.COM IS NOT ACTING AS AN IMMIGRATION AGENT/LAWYER/ADVICER. IMMIYAMI IS A
                                        COMMAN
                                        PLATFORM WHERE IMMGRATION SEEKERS AND IMMIGRATION SERVICE PROVIDERS MEET EACH
                                        OTHER.</p>
                                    <p>BY USING THE SERVICE OR OTHER SERVICES PROVIDED BY US, </p>
                                    <p>YOU ACKNOWLEDGE THAT YOU HAVE READ THESE TERMS AND AGREE TO BE BOUND BY THEM.</p>
                                    <h4>30.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Us</h4>
                                    <p>The Service is operated by Duchy Global Limited. Our registered address is 15C,
                                        Manning
                                        Street, Hamilton Central, Hamilton, New Zealand, 3204.</p>
                                    <p>Please send Your feedback, comments, requests for technical support by email at:
                                        support@immiyami.com.<br></p>

                                    <hr>
                            </div>
                            <div class="custom-control custom-checkbox">

                                <input type="checkbox" required class="custom-control-input" id="signup-check1">
                                <label class="custom-control-label" for="signup-check1">I agree to the all <a
                                        href="/pages/terms-conditions">terms & conditions</a> of ImmiYami.</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-inline reg-btn-subS reg-btn-sub-d">
                                <i class="fas fa-user-check"></i>
                                <span>Create new account</span>
                            </button>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12">
                        <h6 class="linetrue"><span>OR</span></h6>
                    </div>

                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <div id="g_id_onload"
                                data-client_id="310320071786-0nvd1db0bs2cctq6gv4s6m4u9iu6phe3.apps.googleusercontent.com"
                                data-context="signin" data-ux_mode="popup" data-callback="handleCredentialResponse"
                                data-auto_prompt="true">
                            </div>

                            <div class="g_id_signin" data-type="standard" data-shape="rectangular" data-theme="outline"
                                data-text="signin_with" data-size="large" data-logo_alignment="left">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xs-6 col-sm-6 text-center">
                        <div class="fb-login-button" onclick="login()" data-size="medium" data-width="100%" data-size=""
                            data-button-type="" data-layout="" data-auto-logout-link="false"
                            data-use-continue-as="false"></div>
                    </div> -->
                </div>


                <?= $this->Form->end() ?>
                <div class="col-xs-12 col-sm-12">
                    <div class="user-form-direction">
                        <p>Already have an account? Click on the <span><a href="/users/login">( sign in )</a></span>
                            button
                            above.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="forget-tab">
            <div class="user-form-title">
                <h4>Forgot Password!</h4>
                <p>Use email to reset your password.</p>
            </div>
            <?= $this->Form->create(NULL,['url' => '/Users/forget']) ?>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" required placeholder="Email Address">
                        <small class="form-alert">Please follow this example - XXXX@XXXX.XXX</small>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group text-right ">
                        <a href="#login-tab" data-toggle="tab" class="form-blogin">Already have password?</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-inline">
                            <i class="fas fa-unlock"></i>
                            <span>Reset Password</span>
                        </button>
                    </div>
                </div>
            </div>
            <?= $this->Form->end() ?>
            <div class="user-form-direction">
                <p>Don't have an account? Click on the <span><a href="/Users/login?type=register">( sign up
                            )</a></span> button above.</p>
            </div>
        </div>

    </div>
</section>

<script>
    // document.addEventListener('DOMContentLoaded', function() {
       
    // });
    document.getElementById('memberMail').addEventListener('input', function(event) {
            var email = event.target.value;
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var isValid = emailPattern.test(email);
            if (!isValid) {
                event.target.setCustomValidity('Please enter a valid email address.');
            } else {
                event.target.setCustomValidity('');
            }
        });
    
        document.getElementById('supplierMail').addEventListener('input', function(event) {
            var email = event.target.value;
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var isValid = emailPattern.test(email);
            if (!isValid) {
                event.target.setCustomValidity('Please enter a valid email address.');
            } else {
                event.target.setCustomValidity('');
            }
        });
    
    
function validateTP(evt) {
    var theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
        // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\+/;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}



const rmCheck = document.getElementById("signin-check"),
    emailInput = document.getElementById("loginEmail");

if (localStorage.checkbox && localStorage.checkbox !== "") {
    rmCheck.setAttribute("checked", "checked");
    emailInput.value = localStorage.username;
} else {
    rmCheck.removeAttribute("checked");
    emailInput.value = "";
}

function lsRememberMe() {
    if (rmCheck.checked && emailInput.value !== "") {
        localStorage.username = emailInput.value;
        localStorage.checkbox = rmCheck.value;
    } else {
        localStorage.username = "";
        localStorage.checkbox = "";
    }
}
</script>