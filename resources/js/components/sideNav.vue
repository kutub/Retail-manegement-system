<template>
  <section>
    
    <b-sidebar
      position="static"
      :mobile="mobile"
      :expand-on-hover="expandOnHover"
      :reduce="reduce"
      type="is-light"
      open
    >
      <div class="p-1">
  
        <b-menu class="is-custom-mobile">

          <b-menu-list label="Navigation Menu">
            <b-menu-item active expanded icon="settings" label="Mange Suppliers">
              <b-menu-item @click="href('/home/supplier')" icon="account" label="Suppliers List"></b-menu-item>
              <b-menu-item @click="href('/home/supplier/create')" icon="account" label="Add New Supplier"></b-menu-item>
            </b-menu-item>
            <b-menu-item icon="account" label="Manage Product">
              <b-menu-item icon="account-box" label="Categories">
                <b-menu-item icon="account-box" @click="href('/home/category')" label="Category List"></b-menu-item>
                <b-menu-item icon="account-box" @click="href('/home/category/create')" label="Create New Category"></b-menu-item>
              </b-menu-item>
              <b-menu-item icon="account-box" label="Products">
                <b-menu-item icon="account-box" label="Product List"></b-menu-item>
                <b-menu-item icon="account-box" label="Add New Product"></b-menu-item>
              </b-menu-item>
              <b-menu-item icon="account-box" label="Receipt Products"></b-menu-item>
            </b-menu-item>
          </b-menu-list>
        
          <b-menu-list label="Actions">
            <b-menu-item icon="logout" label="Logout"></b-menu-item>
          </b-menu-list>

        </b-menu>
      </div>
    </b-sidebar>
  </section>
</template>

<script>
export default {
  data() {
    return {
      expandOnHover: true,
      mobile: "reduce",
      reduce: false
    };
  },
  methods:{
    href(url){
      console.log('click');
      window.location.href = url;
    }
  }
};
</script>

<style lang="scss">
.p-1 {
  padding: 1em;
}
.b-sidebar{
  .sidebar-content{
     min-height: 100vh;
  }
 
}
.menu-list a.is-active{
  background-color: #00d1b2;
}
@media screen and (max-width: 1023px) {
    .b-sidebar {
        .sidebar-content {
            &.is-mini-mobile {
                &:not(.is-mini-expand),
                &.is-mini-expand:not(:hover) {
                    .menu-list {
                        li {
                            a {
                            span:nth-child(2) {
                                display: none;
                            }
                            }
                            ul {
                            padding-left: 0;
                            li {
                                a {
                                display: inline-block;
                                }
                            }
                            }
                        }
                    }
                    .menu-label:not(:last-child) {
                        margin-bottom: 0;
                    }
                }
            }
        }
    }
}
@media screen and (min-width: 1024px) {
    .b-sidebar {
        .sidebar-content {
            &.is-mini {
                &:not(.is-mini-expand),
                &.is-mini-expand:not(:hover) {
                    .menu-list {
                        li {
                            a {
                            span:nth-child(2) {
                                display: none;
                            }
                            }
                            ul {
                            padding-left: 0;
                            li {
                                a {
                                display: inline-block;
                                }
                            }
                            }
                        }
                    }
                    .menu-label:not(:last-child) {
                        margin-bottom: 0;
                    }
                }
            }
        }
    }
}
</style>