<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/styles.css" type="text/css" />
			
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/slider.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/custom.js"></script>

<!-- Galeri foto -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/scrollable-horizontal.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/scrollable-buttons.css">
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.tools.min.js"></script>

<script type="text/javascript"> 
  $(document).ready(function(){
    $("div.scrollable").scrollable();

    $(".items img").click(function() {

         // hilangkan _t dibelakang nama file foto untuk foto yang besar
         // misal foto kecil (air_t.jpg) dihilangkan _t untuk foto besar menjadi (air.jpg)
         var url = $(this).attr("src").replace("_t", "");

         // untuk area gambar besar diberikan efek fade (semi transparan)
         var wrap = $("#image_wrap").fadeTo("medium", 0.5);

         // load foto
       var img = new Image();
          img.onload = function() {
          wrap.fadeTo("fast", 1);
          wrap.find("img").attr("src", url);
         };
         img.src = url;
    }).filter(":first").click();
    });
  </script>
        
<style>
    /* style untuk image wrapper (preview image)  */
    #image_wrap {
         width:677px;
         margin:15px 0 15px 40px;
         padding:15px 0;
         text-align:center;
         background-color:#efefef;
         border:2px solid #fff;
         outline:1px solid #ddd;
         -moz-ouline-radius:4px;
    }
</style>

<!-- End galeri foto--> 

<!--
widget, a free CSS web template by ZyPOP (www.zypopwebtemplates.com)

Download: http://www.zypopwebtemplates.com

License: Creative Commons Attribution
//-->
</head>

<body class="homepage">
<div id="container">
	<div id="header">
    	<h1><a href="<?php echo base_url('home/index'); ?>">Himpunan Pelajar <strong>Mahasiswa Wapulaka</strong></a></h1>
        <h2>Mintarapo Hake Katamo Topintara</h2>
        <div class="clear"></div>
    </div>
    <div id="nav">
    	<ul class="sf-menu dropdown">
        	<li><a href="<?php echo base_url('home/index'); ?>">Beranda</a></li>
            <li><a href="<?php echo base_url('home/profil/pb'); ?>">Profil PB</a></li>
            <li><a class="has_submenu" href="">Profil Cabang</a>
            	<ul>
                	<?php foreach ($cabang as $key => $row) : ?>
                    <li><a href="<?php echo base_url('home/profil/'. $row->kd_cbg); ?>"><?php echo $row->nama_cbg; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li><a href="<?php echo base_url('anggota/index'); ?>">Daftar Anggota</a></li>
            <li><a class="has_submenu" href="<?php echo base_url('alumni/index'); ?>">Kolom Alumni</a>
            	<ul>
                	<li><a href="<?php echo base_url('alumni/add'); ?>">Tambah data alumni</a></li>
                </ul>
            </li>
            <li><a href="<?php echo base_url('artikel/index'); ?>">Artikel</a></li>
            <li><a href="<?php echo base_url('home/galeri'); ?>">Galeri Foto</a></li>
            <li><a href="<?php echo base_url('login/index'); ?>">Login</a></li>
        </ul>
    </div>
    
    <div id="slides-container" class="slides-container">
        <div id="slides">
            <?php foreach ($artikel as $key => $row) : ?>
            <div>
                <div class="slide-image"><img src="<?php echo base_url(); ?>public/images/logo.png" alt="Logo hpmw" /></div>
                <div class="slide-text">
                    <h2><?php echo $row->judul; ?></h2>
                    <p><?php echo word_limiter($row->content, 25); ?></p>
                    <p class="frontpage-button">
                    	<?php echo anchor('artikel/readmore/' .$row->id_artikel, 'Readmore'); ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
		</div>
        <div class="controls"><span class="jFlowNext"><span>Next</span></span><span class="jFlowPrev"><span>Prev</span></span></div>        
        <div id="myController" class="hidden"><span class="jFlowControl">Slide 1</span><span class="jFlowControl">Slide 1</span><span class="jFlowControl">Slide 1</span></div>
    </div>
        
    <div id="body">            
		<div id="content">
            <div class="box">
               <h2><?php echo $judul; ?></h2>
               <p><?php $this->load->view($content); ?></p>
            </div>
        </div>
        
        <div class="sidebar">
            <ul>	
               <li>
                    <h4><span>Agenda <strong>PB</strong></span></h4>
                    <ul class="blocklist">
                        <li><a href="<?php echo base_url('home/agenda/pb'); ?>">Agenda Pengurus Besar</a></li>
                    </ul>
                </li>
                <li>
                    <h4><span>Agenda <strong>Cabang</strong></span></h4>
                    <ul class="blocklist">
                        <?php foreach ($cabang as $key => $row) : ?>
                        <li><a href="<?php echo base_url('home/agenda/'. $row->kd_cbg); ?>"><?php echo $row->nama_cbg; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>                
                <li>
                    <h4><span>Pesan <strong>Singkat</strong></span></h4>
                    <ul>
                        <?php foreach ($pesan as $row) : ?>
                            <li><strong><?php echo $row->nama; ?> : </strong> <?php echo $row->pesan; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php echo form_open('home/add_pesan'); ?>
                        <?php echo validation_errors(); ?>
                        <table style="border: 1px dashed">
                            <tr>
                                <td>Nama</td><td><input type="text" name="nama"></td>
                            </tr>
                            <tr>
                                <td>Pesan</td><td><textarea name="pesan" cols="23" rows="5"></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input class="formbutton" value="Kirim pesan" type="submit" /></td>
                            </tr>
                        </table>
                    <?php echo form_close(); ?>
                </li>                
            </ul> 
        </div>
    	<div class="clear"></div>
    </div>
</div>
  <div id="footer">
      <div class="footer-content">
        <div class="footer-box">
            <h4>Tentang webiste</h4>
            <p>Aplikasi website ini dibuat dengan tujuan untuk memudahkan komunikasi antara seluruh warga Wapulaka yang ada di nusantara ini.
                Disamping itu, website ini juga dibuat untuk memudahkan seluruh pengurus organisasi Himpunan Pelajar Mahasiswa Wapulaka
            dalam mengelolah data-data organisasinya, baik data anggota, data cabang, data agenda kegitan, dan lain-lain.</p>
        </div>
        
        <div class="footer-box">
            <h4>Recent post</h4>
            <ul>
                <?php foreach ($recent as $key => $row) : ?>
              <li><a href="<?php echo base_url('artikel/readmore/'. $row->id_artikel); ?>"><?php echo $row->judul; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>         
        <div class="clear"></div> 
    </div>
    <div id="footer-links">

     <!-- A link to http://www.zypopwebtemplates.com must remain. To remove link see http://www.zypopwebtemplates.com/licensing -->
            <p>&copy; YourSite 2010. <a href="http://zypopwebtemplates.com/">Free Web Layouts</a> by ZyPOP</p>
    </div>  
</div>
</body>
</html>