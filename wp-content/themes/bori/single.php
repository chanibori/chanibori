<?php
	get_header();
?>

	<article class="content px-3 py-5 p-md-5">

		<?php
			if ( have_posts() ) {
				
				while ( have_posts() ) {

					the_post();
                    
                    // c : first-param : file_path, second-param : type
                    // c : template-parts파일 보면, 안에 content-article.php가 있음, file-path는 해당 파일까지 도달하는데 쓰고, 두번째 param인 'article'은 '-XXXXXXX'처럼
                    //     '-'에 붙은 이름과 match하는 역할을 하는 듯
                    get_template_part( 'template-parts/content', 'article' );

				}

			}
		?>

	</article>

<?php
	get_footer(); 
?>