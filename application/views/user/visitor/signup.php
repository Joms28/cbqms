<html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Cloud-Based Queuing Management System</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() . "assets/new/"; ?>plugins/images/favicon.png">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  	<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </head>
  <body style="background-image: url('<?php echo base_url(); ?>assets/new/plugins/images/new-users/1.jpg');background-position:center;background-repeat: no-repeat;background-size: cover;color:#006CB7">

		<div class="container-fluid" style="background:	rgba(255,250,205,0.6);background-size: cover;height:100%">

			<div class="row justify-content-md-center" style="padding:30px">

				<div class="col-md-5">
					<a href="<?php echo base_url(); ?>" class="btn btn-info" style="margin-bottom:10px">BACK</a>
					<div class="card shadow">
					  <h5 class="card-header" style="color:gray">
					    REGISTER HERE
					  </h5>
					  <div class="card-body">
							<?php echo form_open(base_url() . 'signup'); ?>

							<?php if($this->session->flashdata('login_error')): ?>
								<div class="alert alert-danger" role="alert">
									<small><?php echo $this->session->flashdata('login_error'); ?></small>
								</div>
							<?php endif; ?>

								<div class="form-group">
									<label style="color:gray">First Name</label><label style="color:red">*</label>
									<input type="text" class="form-control" name="fname" value="<?php echo set_value('fname'); ?>">
									<?php echo form_error('fname', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
								</div>

		            <div class="form-group">
									<label style="color:gray">Last Name</label><label style="color:red">*</label>
									<input type="text" class="form-control" name="lname" value="<?php echo set_value('lname'); ?>">
									<?php echo form_error('lname', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
								</div>

                <div class="form-group">
									<label style="color:gray">Gender</label><label style="color:red">*</label>
                  <select class="form-control" name="gender">
                    <option value="0">Male</option>
                      <option value="1">Female</option>
                  </select>
									<?php echo form_error('gender', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
								</div>

		            <div class="form-group">
									<label style="color:gray">Email Address</label><label style="color:red">*</label>
									<input type="text" class="form-control" name="email" <?php echo set_value('email'); ?>>
									<?php echo form_error('email', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
								</div>

		            <div class="form-group">
									<label style="color:gray">Mobile Number (optional)</label>
									<input type="text" class="form-control" name="mobile" <?php echo set_value('mobile'); ?>>
									<?php echo form_error('mobile', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
								</div>

		            <div class="form-group">
									<label style="color:gray">Username</label><label style="color:red">*</label>
									<input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>">
									<?php echo form_error('username', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
								</div>

								<div class="form-group">
									<label style="color:gray">Password</label><label style="color:red">*</label>
									<input type="password" class="form-control" name="password">
									<?php echo form_error('password', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
                  <small>(Require atleast: 8 Characters mixed with 1 Capital letter, 1 Number, 1 Symbol)</small>
								</div>

		            <div class="form-group">
									<label style="color:gray">Re-type Password</label><label style="color:red">*</label>
									<input type="password" class="form-control" name="repassword">
									<?php echo form_error('repassword', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
								</div>

                <div class="form-group">
									<input type="checkbox" value="1" name="tos" required/> <span style="color:black">I agree to the</span> <a style="pointer:cursor" href="" data-toggle="modal" data-target="#tos">Terms of Service</a> <span style="color:black">and</span> <a href="" data-toggle="modal" data-target="#policy" style="pointer:cursor">Privacy Policy</a>

								</div>

								<button class="btn btn-primary ">CREATE ACCOUNT</button>
							<?php echo form_close(); ?>
					  </div>
					</div>
				</div>



			</div>

		</div>


    <div class="modal fade" id="tos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:gray">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">TERMS OF SERVICE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5>Introduction</h5>
            <p>Cloud-Based Queuing Management System operates a visitor service management platform that makes available as a service, which enables school registrar and cashier to manage waiting lines and walk-in appointments at STI College Sta. Maria, which makes available through online at http//:cbqms.live</p>
            <p>Our Privacy Policy also governs your use of our Service and explains how we collect, safeguard and disclose information that results from your use of our web pages.</p>
            <p>Your agreement with us includes these Terms and our Privacy Policy (“Agreements”). You acknowledge that you have read and understood Agreements, and agree to be bound of them.</p>
            <p>If you do not agree with (or cannot comply with) Agreements, then you may not use the Service, but please let us know by emailing at support@cbqms.live so we can try to find a solution. These Terms apply to all visitors, users and others who wish to access or use Service.</p>

            <h5>Access to the CBQMS Service</h5>
            <p>1. The Client must treat any username and password used to access the CBQMS Service or a Client Account as Confidential Information, and must not disclose such information to any third party (other than to Authorised Users) and must take appropriate safeguards in accordance with good industry practice to prevent unauthorised access to the CBQMS Service.</p>
            <p>2. The Client shall procure that each Authorised User keeps secure and confidential any username and password provided to, or created by, that Authorised User for their use of the CBQMS Service, and that they will not disclose such username and password to any third party, including any other Authorised Users or persons within the Client’s organisation, company or business.</p>
            <p>3. The Client is responsible for maintaining the confidentiality of its login details for its Client Accounts and for any activities that occur under its Client Accounts, including the activities of Authorised Users.</p>
            <p>4. CBQMS encourages the Client to use, and to encourage Authorised Users to use “strong” passwords (using a combination of upper and lower case letters, and numbers) with its Client Accounts.</p>
            <p>5. The Client must prevent any unauthorised access to, or use of, the CBQMS Service, and must promptly notify CBQMS in the event of any such unauthorised access or use. If the Client has any concerns about the login details for any Client Account, or thinks any of them may have been misused, the Client shall notify CBQMS at support@cbqms.live. </p>
            <p>6. The Client is responsible for making all arrangements necessary for Authorised Users to gain access to the CBQMS Service, using the appropriate features and functionalities of the CBQMS Service.</p>

            <h5>Data Protection</h5>
            <p>1. The Client shall, and shall procure that its Authorised Users shall, comply with applicable Data Protection Laws with respect to: the processing of any personal data contained in Client Data; all communications (electronic or otherwise) with Customers.</p>
            <p>2. For the purpose of this clause 15 the terms “controller”, “processor”, “data subject”, “personal data”, and “process” shall have the same meaning as set out in the GDPR.</p>

            <h5>Content</h5>
            <p>Content found on or through this Service are the property of Cloud-Based Queuing Management System or used with permission. You may not distribute, modify, transmit, reuse, download, repost, copy, or use said Content, whether in whole or in part, for commercial purposes or for personal gain, without express advance written permission from us.</p>

            <h5>Accounts</h5>
            <p>When you create an account with us, you guarantee that you are part of the community of STI College Sta. Maria, and that the information you provide us is accurate, complete, and current at all times. Inaccurate, incomplete, or obsolete information may result in the immediate termination of your account on Service.</p>
            <p>You are responsible for maintaining the confidentiality of your account and password, including but not limited to the restriction of access to your computer and/or account. </p>
            <p>You agree to accept responsibility for any and all activities or actions that occur under your account and/or password, whether your password is with our Service or a third-party service. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.</p>
            <p>You may not use as a username the name of another person or entity or that is not lawfully available for use, a name or trademark that is subject to any rights of another person or entity other than you, without appropriate authorization. You may not use as a username any name that is offensive, vulgar or obscene.</p>
            <p>We reserve the right to refuse service, terminate accounts, remove or edit content, or cancel orders in our sole discretion.</p>

            <h5>Intellectual Property</h5>
            <p>Service and its original content (excluding Content provided by users), features and functionality are and will remain the exclusive property of Cloud-Based Queuing Management System and its licensors. Service is protected by copyright, trademark, and other laws of and foreign countries. Our trademarks may not be used in connection with any product or service without the prior written consent of Cloud-Based Queuing Management System.</p>

            <h5>Copyright Policy</h5>
            <p>We respect the intellectual property rights of others. It is our policy to respond to any claim that Content posted on Service infringes on the copyright or other intellectual property rights (“Infringement”) of any person or entity.</p>
            <p>If you are a copyright owner, or authorized on behalf of one, and you believe that the copyrighted work has been copied in a way that constitutes copyright infringement, please submit your claim via email to support@cbqms.live, with the subject line: “Copyright Infringement” and include in your claim a detailed description of the alleged Infringement, under “Republic Act No. 8293”</p>
            <p>You may be held accountable for damages (including costs and attorneys’ fees) for misrepresentation or bad-faith claims on the infringement of any Content found on and/or through Service on your copyright.</p>
            <p>You can contact our Copyright Agent via email at support@cbqms.live.</p>

            <h5>Termination</h5>
            <p>We may terminate or suspend your account and bar access to Service immediately, without prior notice or liability, under our sole discretion, for any reason whatsoever and without limitation, including but not limited to a breach of Terms.</p>
            <p>If you wish to terminate your account, you may simply discontinue using Service.</p>
            <p>All provisions of Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>

            <h5>Governing Law</h5>
            <p>These Terms shall be governed and construed in accordance with the laws of Philippines, which governing law applies to agreement without regard to its conflict of law provisions.</p>
            <p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service and supersede and replace any prior agreements we might have had between us regarding Service.</p>

            <h5>Changes to Service</h5>
            <p>We reserve the right to withdraw or amend our Service, and any service or material we provide via Service, in our sole discretion without notice. We will not be liable if for any reason all or any part of Service is unavailable at any time or for any period. From time to time, we may restrict access to some parts of Service, or the entire Service, to users, including registered users.</p>

            <h5>Amendments to Terms</h5>
            <p>We may amend Terms at any time by posting the amended terms on this site. It is your responsibility to review these Terms periodically.</p>
            <p>Your continued use of the Platform following the posting of revised Terms means that you accept and agree to the changes. You are expected to check this page frequently so you are aware of any changes, as they are binding on you.</p>
            <p>By continuing to access or use our Service after any revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, you are no longer authorized to use Service.</p>

            <h5>Waiver and Severability</h5>
            <p>No waiver by Company of any term or condition set forth in Terms shall be deemed a further or continuing waiver of such term or condition or a waiver of any other term or condition, and any failure of Company to assert a right or provision under Terms shall not constitute a waiver of such right or provision.</p>
            <p>If any provision of Terms is held by a court or other tribunal of competent jurisdiction to be invalid, illegal or unenforceable for any reason, such provision shall be eliminated or limited to the minimum extent such that the remaining provisions of Terms will continue in full force and effect.</p>

            <h5>Acknowledgement</h5>
            <p>BY USING CBQMS SERVICES PROVIDED BY US, YOU ACKNOWLEDGE THAT YOU HAVE READ THESE TERMS OF SERVICE AND AGREE TO BE BOUND BY THEM.</p>

            <h5>Contact Us</h5>
            <p>Please send your feedback, comments, requests for technical support by email: <b>support@cbqms.live</b>.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="policy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:gray">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">PRIVACY POLICY</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <h5>Storing and Disseminating Your Personal Data</h5>
            <p><b>Security.</b> To secure your personal information from accidental or unlawful deletion, loss, modification, or damage, we use appropriate technical and organizational means. All of the personal data we collect will be kept on secure servers run by third-party cloud hosting providers. We will never send you an unauthorized email or call you to ask for your account ID, password, credit or debit card information, or national identity numbers.</p>

            <h5>Your Personal Information Rights</h5>
            <p>You have the following rights in relation to your personal information that we hold, in line with applicable privacy law:</p>
            <p>1. <b>Right of access.</b> You have the right to request confirmation of whether and where we are processing your personal data; information about the types of personal data we are processing; information about the types of recipients with whom we may share your personal data; and a copy of the personal data we keep about you.</p>
            <p>2. <b>Right of portability.</b> In some cases, you have the right to seek a copy of the personal information you have submitted to us in a structured, commonly used, machine-readable format that allows for re-use, or to request that your personal data be transferred to another person.</p>
            <p>3. <b>Right to rectification.</b> You have the right to have any inaccurate or incomplete personal information we have about you corrected as soon as possible.</p>
            <p>4. <b>Right to erasure.</b> If the continuous processing of your personal information is not justified, you have the right to request that we destroy it without delay in certain instances.</p>
            <p>5. <b>Right to restriction.</b> You have the right to request that we limit the purposes for which we treat your personal information in certain instances, such as when the accuracy of the personal information is denied by you.</p>
            <p>6. <b>Right to object.</b> You also have the right to object to any processing based on our legitimate interests if you have grounds that are specific to your circumstances. There may be compelling reasons for us to continue processing your personal data, in which case we shall analyze and notify you. Marketing activities might be objected to for any cause.</p>
            <p>Please contact us using the contact information listed at the bottom of this Privacy Policy if you wish to exercise one of these rights.</p>
            <p>You can also use the relevant functionality on the CBQMS Service to examine and modify some of the personal information you've provided to us.</p>

            <h5>Changes to This Policy</h5>
            <p>We may amend this Privacy Policy from time to time, so please check back carefully. When we make significant changes to this Privacy Policy, we will update the "last changed" date at the top of the page. When changes to this Privacy Policy are posted on this page, they become effective.</p>

            <h5>Contact Us</h5>
            <p>Please send your feedback, comments, requests for technical support by email: <b>support@cbqms.live.</b></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>

  </html>
