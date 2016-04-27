<div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">
            <li><a href="home.html"><i class="icon-home4"></i> <span>Home</span></a></li>
            <li>
                <a href="javascript:void(0);"><i class="icon-stack2"></i> <span>Category Management</span></a>
                <ul>
                    <li <?php if($page == 'molecule') echo "class='active'";?>><a href="molecule_mgmt">Molecule</a></li>
                    <li <?php if($page == 'indication') echo "class='active'";?>><a href="indication_mgmt">Indication</a></li>
                    <li <?php if($page == 'client') echo "class='active'";?>><a href="client_mgmt">Client</a></li>
                </ul>
            </li>
            <li><a href="db-setup.html"><i class="icon-steam"></i> <span>Client Setup</span></a></li>
            <li>
                <a href="#"><i class="icon-database-arrow"></i> <span>Verify</span></a>
                <ul>
                    <li><a href="product.html">Product</a></li>
                    <li><a href="condition.html">Condition</a></li>
                    <li><a href="sponsor.html">Sponsor</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>