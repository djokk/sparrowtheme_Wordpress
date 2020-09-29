<aside id="sidebar">

<div class="widget widget_search">
    <h5>Search</h5>
    <form action="<?php echo home_url() . '/'; ?>">

        <input name="s" class="text-search" type="text" onfocus="if (this.value == 'Search here...') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Search here...'; }" value="Search here...">
        <input type="submit" class="submit-search" value="">

    </form>
</div>

<?php dynamic_sidebar('sidebar'); ?>

</aside>