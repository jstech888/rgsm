<div class="col-md-4">
    <div class="footer-col mx-auto">
        <h4> <?php echo $NewsTitle;?> </h4>
        <ul class="list-unstyled v-space-lg">
            <?php foreach( $itemListNews AS $item ) { ?>
            <li class="media">
                <i class="fas fa-chevron-right"></i>
                <div class="media-body">
                    <a href="/news/detail/<?php echo $item["id"];?>"><?php echo $item["blog-title"];?></a>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</div> <!-- end of col -->