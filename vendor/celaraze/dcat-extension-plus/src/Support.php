<?php


namespace Celaraze\DcatPlus;


use Celaraze\DcatPlus\Extensions\Form\SelectCreate;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Support\Helper;

class Support
{
    /**
     * 快速翻译（为了缩短代码量）
     * @param $string
     * @return array|string|null
     */
    public static function trans($string)
    {
        return ServiceProvider::trans($string);
    }

    /**
     * 初始化配置注入
     */
    public function initConfig()
    {
        /**
         * 处理站点LOGO自定义
         */
        if (empty(admin_setting('site_logo'))) {
            $logo = admin_setting('site_logo_text');
        } else {
            $logo = config('app.url') . '/uploads/' . admin_setting('site_logo');
            $logo = "<img src='$logo'>";
        }

        /**
         * 处理站点LOGO-MINI自定义
         */
        if (empty(admin_setting('site_logo_mini'))) {
            $logo_mini = admin_setting('site_logo_text');
        } else {
            $logo_mini = config('app.url') . '/uploads/' . admin_setting('site_logo_mini');
            $logo_mini = "<img src='$logo_mini'>";
        }

        /**
         * 处理站点名称
         */
        if (empty(admin_setting('site_url'))) {
            $site_url = 'http://localhost';
        } else {
            $site_url = admin_setting('site_url');
        }

        if (empty(admin_setting('site_debug'))) {
            $site_debug = true;
        } else {
            $site_debug = admin_setting('site_debug');
        }

        if (empty(admin_setting('theme_color'))) {
            $theme_color = 'blue-light';
        } else {
            $theme_color = admin_setting('theme_color');
        }
        if (empty(admin_setting('sidebar_style'))) {
            $sidebar_style = 'default';
        } else {
            $sidebar_style = admin_setting('sidebar_style');
        }

        /**
         * 复写admin站点配置
         */
        config([
            'app.url' => $site_url,
            'app.debug' => $site_debug,
            'app.locale' => admin_setting('site_lang'),
            'app.fallback_locale' => admin_setting('site_lang'),

            'admin.title' => admin_setting('site_title'),
            'admin.logo' => $logo,
            'admin.logo-mini' => $logo_mini,
            'admin.layout.color' => $theme_color,
            'admin.layout.body_class' => $sidebar_style
        ]);
    }

    /**
     * 复写菜单栏
     */
    public function injectSidebar()
    {
        if (admin_setting('sidebar_indentation')) {
            admin_inject_section(Admin::SECTION['LEFT_SIDEBAR_MENU'], function () {
                $menuModel = config('admin.database.menu_model');

                $builder = Admin::menu();

                $html = '';
                foreach (Helper::buildNestedArray((new $menuModel())->allNodes()) as $item) {
                    $html .= view(self::menu_view(), ['item' => $item, 'builder' => $builder])->render();
                }

                return $html;
            });
        }
    }

    /**
     * 返回菜单视图路径
     * @return string
     */
    public static function menu_view(): string
    {
        return 'celaraze.dcat-extension-plus::menu';
    }

    public function injectFields()
    {
        if (admin_setting('field_select_create')) {
            Form::extend('selectCreate', SelectCreate::class);
        }
    }

    public function footerRemove()
    {
        if (admin_setting('footer_remove')) {
            Admin::style(
                <<<CSS
.main-footer {
    display: none;
}
CSS
            );
        }
    }

    public function headerBlocks()
    {
        if (admin_setting('header_blocks')) {
            Admin::style(
                <<<CSS
.navbar {
    margin: 0 35px 0 35px;
    height: 70px;
}

.nav-link {
    padding: 0;
}

.empty-data {
    text-align: center;
    color: rgba(0, 0, 0, 0.7);
    display: flex;
    align-items: center;
    justify-content: left;
}

.font-grey {
    color: white;
}

CSS
            );
        }
    }
}
