<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
?>
<?php $this->need('compoment/head.php');?>
<?php $this->widget('Widget_Metas_Category_List')->to($categorys);?>
<?php while ($categorys->next()): ?> <?php if ($this->category ==
$categorys->slug):?>
<?php $slug = $categorys->slug; ?>
<?php $slug_name = $categorys->title; ?>
<?php endif; ?>
<?php endwhile; ?>
<?php 
$category = array();
if(empty(CategoryEncrypt(categeid($slug))['Cate_Encrypt_Password'])){
$category['md5_password'] = md5Encode('654321');//初始密码，即加密密码没填的情况下的默认密码，可改动    
}
else{
$category['md5_password'] = md5Encode(CategoryEncrypt(categeid($slug))['Cate_Encrypt_Password']);
}
$category['type'] = "category";
$category['category'] = $slug;
$_POST['data'] = $category;
$password = Typecho_Cookie::get('category_'.$slug);
if ((!empty($password) && $password == $category['md5_password']) || $this->user->hasLogin()){
    $cookie = true;
}

?>
<?php if(Bsoptions('Cate_Encrypt_open') == true && !empty(CategoryEncrypt(categeid($slug))) && !$cookie):?>
<?php $this->need('modules/lock_article.php'); ?>
<?php else:?>

<?php if(Bsoptions('Diy') == true) :?>
<?php $this->need('pages/diy-post.php'); ?>
  <?php endif; ?>

<?php if(Bsoptions('Diy') == false || empty(Bsoptions('Diy'))) :?>
<?php $this->need('pages/post.php'); ?>
  <?php endif; ?>
  <?php endif; ?>
<?php if(Bsoptions('Readmode') == true): ?>  
<?php $this->need('modules/readmode.php'); ?>
  <?php endif; ?>


<script type="text/javascript" src="<?php AssetsDir();?>assets/js/bearsimple_single.js?v=<?php  echo themeVersion(); ?>"></script>
<?php $this->need('compoment/sidebar.php'); ?>
<?php $this->need('compoment/foot.php'); ?>


