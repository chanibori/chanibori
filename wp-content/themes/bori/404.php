<?php
	get_header();
?>

	<article class="content px-3 py-5 p-md-5">

        <h1>Page Not Found</h1>
		
        <!-- 404페이지에 Search Form이 필요할지는 추후에 수정 예정이고, search form은 wp설정에서도 drag&drop으로 추가할 수 있다. --> 
        <?php
            get_search_form();
        ?>

	</article>

<?php
	get_footer(); 
?>