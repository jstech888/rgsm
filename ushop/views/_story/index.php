    <style>
      .breadcrumb-block {
        position: relative;
        display: block;
        margin-left: 0;
        margin-right: 0;
      }
      .caption > H3 {
        margin-top: 5px;
        margin-bottom: 5px;
        height: auto;
        cursor: pointer;
        font-weight: normal;
        font-size: 18px;
      }
      .caption > H3:hover {
        color: #601586;
      }
      .water-flow {
        position: relative;
        display: block;
      }
      @media (max-width: 1400px) {
        .breadcrumb-block {
          width: 950px;
          margin: 0 auto;
          padding: 0 11px;
        }
        .water-flow {
          margin-left: auto;
          margin-right: auto;
        }
      }
      @media (max-width: 992px) {
        .breadcrumb-block {
          width: 705px;
          margin: 0 auto;
          padding: 0 11px;
        }
      }
      @media (max-width: 768px) {
        .breadcrumb-block {
          width: 305px;
          position: relative;
          max-width: 100%;
          margin: 0 auto;
          padding: 0;
        }
      }
      .item-story {
        width: 300px;
        margin: 10px;
        float: left;
        border: 1px solid #C6C6C6;
      }

      h3.story-title {
        font-size: 20px;
        line-height: 26px;
        margin: 10px 0;
      }
      span.pnl-title {
        font-size: 20px;
        color: #5b1c80;
      }
      .pnl-heading {
        border-bottom: 1px solid #c7c6c6;
        margin-bottom: 5px;
        padding: 5px 0;
      }
      .pnl-body.text-center {
        padding: 15px 0;
      }
      .right.post-time {
        margin: 10px;
        text-align: right;
      }
      .story-image {
        max-width: 100%;
      }
    </style>

    <div id="columns" class="container self video">
      <div class="row mt25">
        <div class="col-md-12">
          <!-- 麵包屑 -->
          <ol class="breadcrumb">
            <li><a href="/"><?php echo $objLang['shoppingcart']["home"];?></a></li>
            <li><a href="/<?php echo $method ; ?>"><?php echo $titleName ; ?></a></li>
            <li><a href="/<?php echo $method ; ?>/detail/<?php echo $id;?>"><?php echo $article["blog-title"];?></a></li>
          </ol>
          <div class="clearfix"></div>
          <!-- /麵包屑 -->
        </div>

        <div class="col-md-12">

          <!-- 商品 主要區塊 -->
          <div class="col-sm-12">

            <div class="story-block mt15">
              <div class="pnl pnl-info pnl-story">
                <div class="pnl-heading">
                  <span class="pnl-title"><?php echo $article["blog-title"];?></span>
                </div>
                <div class="right post-time">
                  <span><?php echo $article["raw-date"];?></span>
                </div>

                <div class="pnl-body text-center">
                  <div class="image-block"><img class="story-image" src="<?php echo $article['blog-extra']["url"];?>" alt="">
                  </div>
                  <div class="story-caption html-content">
                    <?php echo $article['blog-content'];?> 
                  </div>
                </div>
              </div>
              <div class="pnl-story-footer mb25">

                <div class="pull-right">
                  <a class="btn btn-rounded btn-gradient btn-success" href="/"><?php echo $objLang['function_bar']["goHome"];?></a>                  
                </div>
                <div class="clearfix"></div>
              </div>
            </div>

          </div>

        </div>

      </div>

    </div>