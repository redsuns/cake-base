<div class="maincontentinner">
    <ul class="maintabmenu">
        <li class="current"><?php echo $this->Html->link('Sitemap', array('controller' => 'sitemap', 'action' => 'index', 'admin' => true)); ?></li>
    </ul><!--maintabmenu-->

    <?php echo $this->Form->create('Node', array('method' => 'post', 'class' => 'stdform')); ?>
    <div class="content">
        <div class="contenttitle radiusbottom0">
            <h2 class="form"><span>Sitemap Atual</span></h2>
        </div><!--contenttitle-->
        <br />
            <?php echo $this->Html->link('Visualizar', '/files/sitemap.xml', array('target' => '_blank')); ?>
        <br />
        <br />
        <div class="contenttitle radiusbottom0">
            <h2 class="form"><span>URL's cadastradas</span></h2>
        </div><!--contenttitle-->
        <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
            <thead>
                <tr>
                    <th class="head0">URL</th>
                    <th class="head1">Frequência de alteração</th>
                    <th class="head0">Prioridade</th>
                </tr>
            </thead>
            <tbody>
        
        <?php if ( $routes ) { ?>
        
            <?php
            $cont = 1;
            foreach( $routes as $route ) :  ?>
            <tr>
                <td><?php echo $route; ?></td>
                <td>
                <?php 
                    echo $this->Form->input('Node.'.$cont.'.url', array('value' => $route, 'type' => 'hidden'));
                    echo $this->Form->input('Node.'.$cont.'.frequency', array(
                        'type' => 'select', 'options' => array(
                            'daily' => 'Diariamente',
                            'weekly' => 'Semanalmente',
                            'monthly' => 'Mensalmente',
                        ),
                        'label' => false,
                        'empty' => array('' => '---'),
                    ));
                    echo '</td><td>';
                    echo $this->Form->input('Node.'.$cont.'.priority', array(
                        'type' => 'select', 'options' => array(
                            '0.1' => '10%',
                            '0.2' => '20%',
                            '0.3' => '30%',
                            '0.4' => '40%',
                            '0.5' => '50%',
                            '0.6' => '60%',
                            '0.7' => '70%',
                            '0.8' => '80%',
                            '0.9' => '90%',
                            '1.0' => '100%',
                        ),
                        'empty' => array('' => '---'),
                        'label' => false
                    ));
                    $cont++;    
            endforeach;
            echo '<tr><td colspan="3">';
            echo $this->Form->end(array('value' => 'Finalizar', 'label' => 'Finalizar'));
            echo '</td></tr>';
        } else {
            echo '<br /><br /><h1>Nao ha rotas definidas</h1><br /><br />';
        }
        ?>
                    </tbody>
        </table>
    </div><!--content-->

</div><!--maincontentinner-->

<?php $this->Js->buffer(
        'jQuery( ".datepicker" ).datepicker();'
        );