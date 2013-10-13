<div class="mainleft">
    <div class="mainleftinner">

        <div class="leftmenu">
            <ul>
                <li class="pages_admin_index pages_admin_emails sitemap_admin_index"><a href="#" class="editor menudrop"><span>CMS</span></a>
                    <ul>
                        <li><?php
                            echo $this->Html->link($this->Html->tag('span', 'Páginas estáticas'), array('controller' => 'pages', 'action' => 'index', 'admin' => true), array('class' => 'tables', 'escape' => false));
                            ?>    
                        </li>
                        <li><?php
                            echo $this->Html->link($this->Html->tag('span', 'Sitemap'), array('controller' => 'sitemap', 'action' => 'index', 'admin' => true), array('class' => 'tables', 'escape' => false));
                            ?>    
                        </li>
                    </ul>
                </li>
                <li class="users_admin_index users_admin_add groups_admin_index"><a href="#" class="users menudrop"><span>Usuários</span></a>
                    <ul>
                        <li><?php
                            echo $this->Html->link($this->Html->tag('span', 'Listar usuários'), array('controller' => 'users', 'action' => 'index', 'admin' => true), array('class' => 'tables', 'escape' => false));
                            ?>    
                        </li>
                        <li><?php
                            echo $this->Html->link($this->Html->tag('span', 'Adicionar usuário'), array('controller' => 'users', 'action' => 'add', 'admin' => true), array('class' => 'tables', 'escape' => false));
                            ?>    
                        </li>
                        <li><?php
                            echo $this->Html->link($this->Html->tag('span', 'Listar grupos'), array('controller' => 'groups', 'action' => 'index', 'admin' => true), array('class' => 'tables', 'escape' => false));
                            ?>    
                        </li>
                        <li><?php
                            echo $this->Html->link($this->Html->tag('span', 'Adicionar grupo'), array('controller' => 'groups', 'action' => 'add', 'admin' => true), array('class' => 'tables', 'escape' => false));
                            ?>    
                        </li>
                    </ul>
                </li>
            </ul>

        </div><!--leftmenu-->
        <div id="togglemenuleft"><a></a></div>
    </div><!--mainleftinner-->
</div><!--mainleft-->

<?php
$this->Js->buffer('$(\'.' . $this->params['controller'] . '_' . $this->params['action'] . '\').addClass(\'current\')');