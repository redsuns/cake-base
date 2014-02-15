<div class="maincontentinner">
    <ul class="maintabmenu">
        <li id="home"><?php echo $this->Html->link('Home', array('controller' => 'pages', 'action' => 'index','home', 'admin' => true)); ?></li>
        <li id="sobre"><?php echo $this->Html->link('Sobre nos', array('controller' => 'pages', 'action' => 'index', 'sobre', 'admin' => true)); ?></li>
        <li id="faq"><?php echo $this->Html->link('Perguntas frequentes', array('controller' => 'pages', 'action' => 'index', 'faq', 'admin' => true)); ?></li>
        <li id="termos"><?php echo $this->Html->link('Termos de uso', array('controller' => 'pages', 'action' => 'index', 'termos', 'admin' => true)); ?></li>
        <li id="privacidade"><?php echo $this->Html->link('Privacidade', array('controller' => 'pages', 'action' => 'index', 'privacidade', 'admin' => true)); ?></li>
        <li id="contato"><?php echo $this->Html->link('Contato', array('controller' => 'pages', 'action' => 'index', 'contato', 'admin' => true)); ?></li>
    </ul><!--maintabmenu-->

    <?php echo $this->Form->create('Node', array('method' => 'post')); ?>
    <?php echo $this->Form->input('type', array('type' => 'hidden', 'value' => 'page')); ?>
    <?php echo $this->Form->input('location', array('type' => 'hidden', 'value' => $this->request->data['Node']['location'])); ?>
    <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
    <div class="content">
        <div class="contenttitle radiusbottom0">
            <h2 class="form"><span>Texto principal - <?php echo Inflector::humanize($this->request->data['Node']['location']); ?></span></h2>
        </div><!--contenttitle-->
        <?php echo $this->Form->input('main', array('type' => 'textarea', 'class' => 'main', 'rows' => 20, 'label' => false)); ?>
        <br />
        <div class="contenttitle radiusbottom0">
            <h2 class="form"><span>SEO</span></h2>
        </div><!--contenttitle-->
        <br />
        <?php echo $this->Form->input('description', array('type' => 'text', 'class' => 'custom_large', 
            'placeholder' => 'Uma breve descrição ...', 'maxlength' => 155)); ?>
        <small>Uma descrição de até 140 caracteres desta página</small>
        <br />
        <br />
        <?php echo $this->Form->input('keywords', array('type' => 'text', 'class' => 'custom_large', 'placeholder' => 'Separe por vírgula')); ?>
        <small>Separe as keywords com virgula</small>
        <br />
        <br />
        <?php echo $this->Form->end(array('value' => 'Finalizar', 'label' => 'Finalizar', 'class' => 'submit radius2')); ?>
    </div><!--content-->

</div><!--maincontentinner-->



<?php $this->Js->buffer('tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});');

$this->Js->buffer('$(\'#'.$this->request->data['Node']['location'].'\').addClass(\'current\');');
	