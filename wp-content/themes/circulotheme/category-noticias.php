<?php get_header(); ?>

<?php get_template_part('searchbar'); ?>

<?php $bgid = get_post_thumbnail_id(8)?>
<?php $bg = wp_get_attachment_image_src( $bgid, 'slider' ); ?>

<div class="heading-page" style="background-image: url(<?php echo $bg[0]?>);">
    <div class="container-fluid gradient">
        <div class="row">

            <div class="jumbotron">
                <?php $postt = get_post(8); ?>
                <h2><?php echo $postt->post_title; ?></h2>
            </div>
        </div>
    </div>
</div>


<section id="noticias">
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="row">
                    <?php $count = 0?>
                    <?php foreach($posts as $post):?>
                    <?php $count++?>
                    
                    	<div class="col-md-1 date-news">
                                <span class="first"><?php echo the_time('j') ?> </span>
                                <span class="second"><?php echo the_time('M')?></span>
                        </div>
                        <figure class="principal-news col-md-11">
                        	<header class="content-data">
                        		<h4><a href="<?php echo get_permalink($post->ID)?>"><?php echo $post->post_title?></a></h4>
                        		<?php echo get_avatar('singleautor'); ?>
                        		<p class="author">Por: <a class="author" href="<?php echo get_the_author()?>"><?php echo get_the_author()?></a></p>
                        		<div class="clear"></div>
                        	</header>
                            <a class="heading" href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_post_thumbnail($post->ID , 'noticiasenc' , array('class' => 'img-responsive'))?></a>
                            <figcaption>
                                <div class="clear"></div>
                                <p><?php echo substr($post->post_content , 0, 208)?>...</p>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                	<a href="<?php echo get_permalink($post->ID)?>" class="morelink">Ver Info <i class="fa fa-arrow-right"></i></a>
	                                <p class="sede"><span class="fa fa-map-marker"></span> Sede <?php echo get_field('sede',$post->ID); ?></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 share-article">
                                	<ul>
                                		<li><a onclick="basicPopup(this.href);return false" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title(); ?>&summary=&source="><i class="fa fa-linkedin"></i></a></li>
                                		<li><a onclick="basicPopup(this.href);return false" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>"><i class="fa fa-facebook"></i></a></li>
                                		<li><a onclick="basicPopup(this.href);return false" target="_blank" href="http://twitter.com/share?text=<?php echo get_bloginfo('name')?>&nbsp;-&nbsp;<?php echo $post->post_title?>"><i class="fa fa-twitter"></i></a></li>
                                	</ul>
                                </div>
                                <div class="clear"></div>
                            </figcaption>
                        </figure>
                    
                    <?php endforeach;?>  

                </div>
            </div>

            <?php get_sidebar('noticias_view'); ?>
            <div class="col-md-6">
                <?php wp_pagenavi(); ?>
            </div>

        </div>
    </div>
</section>


<?php get_footer(); ?>