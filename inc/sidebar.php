<div class="sidebar clear">
    <div class="samesidebar clear">
        <h2>Categories</h2>
        <ul>

        <?php
            $query="select*from tbl_catagory ";
            $category=$db->select($query);
            if($category){
                while($result=$category->fetch_assoc()){
            ?>
            <li><a href="posts.php?category=<?php echo $result['id'];?>">

            <?php echo $result['name']?></a></li>
          
                <?php }} else{?>
                    <li> No Category created</li>
              <?php   }?>
        </ul>
    </div>

    <div class="samesidebar clear">

        <h2>Latest articles</h2>

         <?php
            $query="select*from tbl_post limit 5";
            $post=$db->select($query);
            if($post){
                while($result=$post->fetch_assoc()){
            ?>
        <div class="popular clear">
                <h3><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h3>
          <img src="admin/upload/<?php echo $result['image'];?>" alt="post image"/>
    <?php echo $fm->textshorten($result['body'] ,120);?>
        </div>
 <?php } }else{header("location:404.php");}?>
        

    </div>

</div>