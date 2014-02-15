<div class="main">
    <div class="container">

        <div class="row">
            <div class="span12">
                <h4><?php echo $title; ?></h4>
            </div>
            <br clear="all"/>
            <div class="span5">
                
                <?php if ( !empty($content) ) : ?>
                    <p><?php echo $content['Node']['main']; ?></p>
                <?php endif; ?>
                
                <?php echo $this->Form->create('Contact'); ?>
                <p>
                    <?php echo $this->Form->input('name', array('label' => __('Your name') . ' *', 'type' => 'text', 'class' => 'span4', 'required')); ?>
                </p>
                <p>
                    <?php echo $this->Form->input('email', array('label' => __('Your e-mail') . ' *', 'type' => 'text', 'class' => 'span4', 'required')); ?>
                </p>
                <p>
                    <?php echo $this->Form->input('subject', array('label' => __('Subject') . ' *', 'type' => 'text', 'class' => 'span4', 'required')); ?>
                </p>
                <p>
                    <?php echo $this->Form->input('message', array('label' => __('Your message') . ' *', 'type' => 'textarea', 'rows' => 5, 'class' => 'span4', 'required')); ?>
                </p>
                <p>
                    <?php echo __('* All fields is need'); ?>
                </p>
                <p>
                    <?php echo $this->Form->end(array('label' => __('Send'), 'value' => 'Enviar', 'class' => 'btn btn-primary')); ?>
                </p>
            </div>
            <div class="span7">
                <?php echo $this->GoogleMapsIframe->setAddress('Rua José Cadilhe, 1283, Água Verde, Curitiba - PR')
                                                    ->setWidth('400px')
                                                    ->setHeight('500px')
                                                    ->show();
                ?>
            </div>
        </div>
    </div>
</div>
<br clear="all"/>
<br clear="all"/>
<br clear="all"/>