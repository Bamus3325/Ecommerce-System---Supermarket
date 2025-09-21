<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Password Manager</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css" />
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag("js", new Date());

    gtag("config", "G-GBZ3SGGX85");
    </script>
    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            "gtm.start": new Date().getTime(),
            event: "gtm.js"
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != "dataLayer" ? "&l=" + l : "";
        j.async = true;
        j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <!-- End Google Tag Manager -->
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <img src="vendors/images/logo.png" style="height: 50px" alt="" />
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="vendors/images/register-page-img.png" alt="" />
                </div>
                <div class="col-md-6 col-lg-5" style="overflow: hidden;">
                    <div class="register-box bg-white box-shadow border-radius-10"
                        style="padding-left: 10px; padding-right: 10px; overflow: hidden;">
                        <div class="wizard-content" style="overflow: hidden;">
                            <form class="tab-wizard2 wizard-circle wizard">
                                <!-- <h5>Basic Account Credentials</h5> -->
                                <section>
                                    <h5 style="padding-top: 15px; padding-bottom: 15px; text-align:center;">Basic
                                        Account Credentials</h5>
                                    <div class="form-wrap max-width-auto mx-auto">
                                        <div class="form-group row">
                                            <!-- <label class="col-sm-4 col-form-label">Email Address*</label> -->
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" name="email" required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <!-- <label class="col-sm-4 col-form-label">Username*</label> -->
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="user" required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <!-- <label class="col-sm-4 col-form-label">Password*</label> -->
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control" name="ass" required />
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Confirm Password*</label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control" name="con-ass" required/>
                                            </div>
                                        </div> -->
                                    </div>
                                </section>
                                <!-- Step 2 -->
                                <!-- <h5 style="padding-top: 10px; padding-bottom: 15px; text-align:center;">Personal
                                    Information</h5>
                                <section>
                                    <div class="form-wrap max-width-auto mx-auto">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Full Name*</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="fname" required />
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-4 col-form-label">Gender*</label>
                                            <div class="col-sm-8">
                                                <div class="custom-control custom-radio custom-control-inline pb-0">
                                                    <input type="radio" id="male" name="gender"
                                                        class="custom-control-input" />
                                                    <label class="custom-control-label" for="male">Male</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline pb-0">
                                                    <input type="radio" id="female" name="gender"
                                                        class="custom-control-input" />
                                                    <label class="custom-control-label" for="female">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Date of Birth</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" name="dob" required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Address</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="address" required />
                                            </div>
                                        </div>
                                    </div>
                                </section> -->
                                <input class="btn btn-primary" type="submit" style="text-align:center;" value="Submit" />
                                <!-- <input type="button" class="form-control" value="subm" name="address" required /> -->

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- success Popup html Start -->
    <button type="button" id="success-modal-btn" hidden data-toggle="modal" data-target="#success-modal"
        data-backdrop="static">
        Launch modal
    </button>
    <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered max-width-400" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h3 class="mb-20">Form Submitted!</h3>
                    <div class="mb-30 text-center">
                        <img src="vendors/images/success.png" />
                    </div>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmod
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="login.html" class="btn btn-primary">Done</a>
                </div>
            </div>
        </div>
    </div>
    <!-- success Popup html End -->
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <script src="src/plugins/jquery-steps/jquery.steps.js"></script>
    <script src="vendors/scripts/steps-setting.js"></script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>