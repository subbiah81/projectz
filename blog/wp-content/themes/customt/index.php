<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php wp_title(); ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/agency.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/css/cexalert.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

    
	<!-- Custom Fonts -->
    <link href="<?php echo get_template_directory_uri(); ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Cex Alert</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#page-top">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">How To</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">News Updates</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
					<li>
						<a href="#blog">Blog</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-facebook fa-lg"></i></a>
					</li>					
					<li>
						<a href="#"><i class="fa fa-twitter fa-lg"></i></a>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

	
	
    <!-- Portfolio Grid Section -->
    <section id="blog" class="bg-light-gray">
        <div class="container">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-heading"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <h3 class="section-subheading text-muted"><p><?php the_time('F jS, Y'); ?> by <strong><?php the_author_posts_link(); ?></strong></p></h3>
					<?php if ( is_single() ) {
						the_content();
					} else {
						the_excerpt();
					} ?>
					<br>
                </div>
            </div>
			<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
			<?php if ( is_single() ) { ?>
			<div class="row">
				<div class="col-lg-6 pagenationleft">
<h4 class="service-heading"><?php previous_post_link() ?></h4>
				</div>
				<div class="col-lg-6">
<h4 class="service-heading pagenationright"><?php next_post_link() ?></h4>
				</div>	
			</div>
			<div class="row">
			<div class="col-lg-12">
			<br>
			<?php comments_template(); ?>
			</div>
			</div>
			<?php } ?>
        </div>
    </section>

	
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">&copy; Copyright 2016. All rights reserved.</span>
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a data-toggle="modal" data-target="#privacyModal">Privacy Policy</a>
                        </li>
<!--                        <li><a href="#">Terms of Use</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </footer>

	<!-- Privacy Policy Modal -->
	
        <div id="privacyModal" class="modal fade" role="dialog">
          <div class="modal-dialog"> 
            
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Privacy Policy</h4>
              </div>
              <div class="modal-body">
                <!-- Content will be loaded from outside html via java script -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
	

    <!-- jQuery -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/classie.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/jqBootstrapValidation.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/contact_me.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/setup_alert.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/onload_script.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/agency.js"></script>

</body>

</html>
