<div class="main">
    <div class="container">

        <div class="row">
            <div class="span12">
                <h4><?php echo $title; ?></h4>
            </div>
            <br clear="all"/>
            <div class="span12">
                <?php if ( !empty($content) ) : ?>
                    <p><?php echo $content['Node']['main']; ?></p>
                <?php endif; ?>
            </div>

            <br clear="all"/>
            <div class="span6">
                <?php echo $this->Form->create('Contact'); ?>
                <p>
                    <?php echo $this->Form->input('name', array('label' => 'Seu nome *', 'type' => 'text', 'class' => 'span4', 'required')); ?>
                </p>
                <p>
                    <?php echo $this->Form->input('email', array('label' => 'Email *', 'type' => 'text', 'class' => 'span4', 'required')); ?>
                </p>
                <p>
                    <?php echo $this->Form->input('subject', array('label' => 'Assunto *', 'type' => 'text', 'class' => 'span4', 'required')); ?>
                </p>
                <p>
                    <?php echo $this->Form->input('message', array('label' => 'Sua mensagem *', 'type' => 'textarea', 'rows' => 5, 'class' => 'span4', 'required')); ?>
                </p>
                <p>
                    <?php echo $this->Form->end(array('label' => 'Enviar', 'value' => 'Enviar', 'class' => 'btn btn-primary')); ?>
                </p>
            </div>
            <div class="span6">
                <?php echo $this->GoogleMaps->setAddress('Rua José Cadilhe, 1283, Água Verde, Curitiba - PR')
                                            ->frameMap();
                ?>
            </div>
        </div>
    </div>
</div>
<br clear="all"/>
<br clear="all"/>
<br clear="all"/>