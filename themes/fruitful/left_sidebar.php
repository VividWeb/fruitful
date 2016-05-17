<? defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('inc/header.php'); ?>

    <div id="headerShell">
        
        <? 
            $a = new Area('Header'); 
            $a->enableGridContainer();
            $a->display($c);    
        ?>
        
    </div>
    
    <div id="mainShell" class="container"> 
        
        <div class="row">
        
            <main class="col-sm-8 col-sm-push-4">      
                
                <article>
                
                    <? 
                        $a = new Area('Main');
                        $a->display($c);    
                    ?>              
                
                </article>
            
            </main>
            
            <section id="sidebar" class="col-sm-4 col-sm-pull-8">
                
                <? 
                    $a = new Area('Sidebar');
                    $a->display($c);    
                ?>
                
            </section>
        
        </div><!-- .row -->
                
    </div><!-- #mainShell -->
    
<? $this->inc('inc/footer.php'); ?> 