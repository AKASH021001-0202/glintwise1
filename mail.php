<?php include('header.php');?>
<section class="get_imtouch" style="
    padding: 160px;
">
    <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">
        <div class="row getintouch">
            <div class="col-lg-7">
                <div class="getintouch_content aos-init aos-animate" data-aos="fade-right" data-aos-duration="600" data-aos-delay="100">
                    <h1>We are <span class="color-hover"> always ready </span> to
                        help you and answer
                        <span class="color-hover">your questions</span>
                    </h1>
                    <p data-aos="fade-right" data-aos-duration="600" data-aos-delay="150" class="aos-init aos-animate">We're always here to assist you with any questions or concerns. Our team is dedicated to providing prompt and reliable support. Feel free to reach out—we're happy to help!</p>
                </div>
                <div class="row">
                    <div class="col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                        <div class="touch_content">
                            <h5>Phone</h5>
                            <div class="divider"></div>
                            <p>+91 81100 50600 / +91 81100 51600</p>
                        </div>
                    </div>
                    <div class="col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="600" data-aos-delay="250">
                        <div class="touch_content">
                            <h5>Email</h5>
                            <div class="divider"></div>
                            <p>info@glintwise.com</p>
                        </div>
                    </div>
                    <div class="col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">
                        <div class="touch_content">
                            <h5>Our location</h5>
                            <div class="divider"></div>
                            <p>No:10,11,1st Floor, Dr.Radhakrishnan Nagar, P.H Road , Arumbakkam,
                            Chennai, Tamil Nadu 600106.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="600" data-aos-delay="350">
                        <div class="touch_content">
                            <h5>Social Media</h5>
                            <div class="divider"></div>
                            <div class="social_icon">
                                <img src="assets/images/fb.svg" alt="">
                                <img src="assets/images/insta.svg" alt="">
                                <img src="assets/images/x.svg" alt="" style="width: 20px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 aos-init aos-animate" data-aos="fade-left" data-aos-duration="600" data-aos-delay="100">
                <div class="getintouch_form background1">
                    <div class="background2">
                        <h2>Get In <span class="color-yellow">Touch</span></h2>
                        <p>We are here to help you. Reach out for any queries.</p>
                        <form method="post" id="contact_form">
                            <div class="input-container aos-init aos-animate" data-aos="fade-up" data-aos-duration="600" data-aos-delay="150">
                                <input type="text" class="custom-input" name="name" id="name" required="" placeholder=" ">
                                <span class="custom-placeholder">Your Name <span class="yellow-star">*</span></span>
                            </div>
                            <div class="input-container aos-init aos-animate" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                                <input type="email" class="custom-input" id="email" name="email" required="" placeholder=" ">
                                <span class="custom-placeholder">Your Email <span class="yellow-star">*</span></span>
                            </div>
                    
                            <div class="input-container aos-init aos-animate" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">
                                <textarea class="custom-input" id="msg" required="" placeholder=" "></textarea>
                                <span class="custom-placeholder">Your Message <span class="yellow-star">*</span></span>
                            </div>
                            
                            <div class="form-group">
                                <ul class="d-flex  captcha">
                                    <li>
                                        <p class="text-dark"><a href="javascript:void(0);" onclick="refreshCaptcha()">
                                                <img id="refreshImage" src="assets/images/refresh.png" width="20">
                                            </a>
                                        </p>
                                    </li>

                                    <li>
                                        <div>

                                            <p class="text-light cap" id="captchaContainer"> </p>

                                        </div>
                                    </li>

                                    <li>

                                        <input type="text" placeholder="Enter Captcha*" id="captcha" class=" form-control custom-input register-input white-input " name="captcha">


                                    </li>
                                </ul>

                            </div>

                            <style>
                                .cap {

                                    padding-left: 10px;
                                    padding-right: 10px;
                                }

                                .captcha {
                                    margin-bottom: 20px;
                                    list-style-type: none;
                                    align-items: center;
                                }

                                .text-dark {
                                    color: #000 !important;
                                }
                            </style>
                            <button type="submit" id="csend" class="btm_submit aos-init aos-animate" data-aos="fade-up" data-aos-duration="600" data-aos-delay="350">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php');?>