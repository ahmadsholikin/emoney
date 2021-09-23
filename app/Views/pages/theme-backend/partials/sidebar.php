<div id="dpSidebarBody" class="sidebar-body">
    <ul class="nav nav-sidebar">
        <li class="nav-label"><?php $uri = service('uri');?>
            <label class="content-label">Menu Sistem</label>
        </li>
        <?php foreach ($menu as $row): ?>
            <?php if (($row['hirarki'] == 1) && ($row['sub'] == 0)): ?>
                <!-- single menu -->
                <li class="nav-item ">
                    <a class="nav-link "  href="<?= backend_url() . '/' . $row['link']; ?>" >
                        <i data-feather="<?=$row['ikon'];?>"></i> <?= entitiestag($row['menu_nama']); ?>
                    </a>
                </li>
                <!-- end of single menu-->
            <?php elseif (($row['hirarki'] == 1) && ($row['sub'] == 1)): ?>
                <!-- dropdown menu -->
                <li class="nav-item <?php if($row['menu_id']==$activeMenu['induk_id']) echo 'show'; ?>">
                    <a class="nav-link with-sub <?php if($row['menu_id']==$activeMenu['induk_id']) echo 'active'; ?>"  href="" >
                        <i data-feather="<?=$row['ikon'];?>"></i> <?= entitiestag($row['menu_nama']); ?>
                    </a>
                    <nav class="nav nav-sub ">
                        <?php foreach ($menu as $row_child): ?>
                            <?php if (($row_child['hirarki'] == 2) && ($row_child['induk_id'] == $row['menu_id'])): ?>
                                <!-- child -->		
                                <a href="<?= backend_url() . '/' . $row_child['link']; ?>" class="nav-sub-link <?php if($uri->getSegment(2)==$row_child['link']) echo 'active'; ?>"><?= entitiestag($row_child['menu_nama']); ?></a>
                                <!-- end of child -->
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </nav>
                    
                </li>
                <!-- end of dropdown menu-->
            <?php endif; ?>
        <?php endforeach; ?>
        
    </ul>
</div>