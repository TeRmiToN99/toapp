<div class="col-sm-12 col-md-12 well" id="form_ingred">
    <h1><?=$blocktitle;?></h1>
    <form id="form_ingred" action="/App/cpanel/post.php?action=<? echo(!empty($ingredient->id) ? 'Update': 'Insert');?>&post_type=Ingredient" method="post" enctype="multipart/form-data">
        <div class="block_info col-sm-6 col-md-6">
            <div class="form-group">
                <label for="title">Заголовок</label><br>
                <input type="text" name="title" id="title" value='<?=$ingredient->title;?>'>
                <input type="text" style="display: none" name="id" id="id" value="<?=$ingredient->id?>">
            </div>
            <div class="form-group">
                <label for="color">Цвет:</label><br>
                <input type="text" name="color" style="border: 2px solid #<?=$ingredient->color;?>" id="color" value="<?=$ingredient->color?>">
            </div>
        <div class="form-group">
            <?php if($ingredient->url_img != ' '):?>
                <img src="<?=$ingredient->url_img;?>">
                <h4>Текущая иконка: <?=$ingredient->url_img;?></h4>
            <?php else: ?>
                <img src="<?=\App\Models\Ingredient::NOIMG?>">
            <?php endif; ?>
            <input type="file" class="form-control-file" id="url_img" name="url_img">
        </div>
            <input type="button" class="btn btn-info" onclick="history.back();" value="< Назад"/>
            <button type="submit" class="btn btn-primary" onclick="this.form.submit;"><i class="fa fa-floppy-o"></i></button>
    </form>
</div>
<div class="color_trips">
    <p><a href="#popup1" class="popup-link">Подобрать цвет</a></p>
        <div style="display:none;">
            <div id="popup1">
                <div style="width: 625px; height: 380px">
                    <div id="container">
                            <div id="yui-picker-bg" class="yui-picker-bg" tabindex="-1" style="background-color: rgb(255, 0, 0);">
                                <div id="yui-picker-thumb" class="yui-picker-thumb" style="left: -2px; top: -7px;">
                                    <img src="/App/images/color_img/picker_thumb.png">
                                </div>
                            </div>
                            <div id="yui-picker-hue-bg" class="yui-picker-hue-bg" tabindex="-1">
                                <div id="yui-picker-hue-thumb" class="yui-picker-hue-thumb" style="left: -2px; top: -8px;">
                                    <img src="/App/images/color_img/hue_thumb.png">
                                </div>
                            </div>
                            <div id="yui-picker-controls" class="yui-picker-controls">
                                <div class="hd"><a id="yui-picker-controls-label" href="#"></a></div>
                                <div class="bd">
                                    <ul id="yui-picker-rgb-controls" class="yui-picker-rgb-controls">
                                        <li>R <input autocomplete="off" size="3" id="yui-picker-r" class="yui-picker-r" name="yui-picker-r"
                                                     value="166"></li>
                                        <li>G <input autocomplete="off" size="3" id="yui-picker-g" class="yui-picker-g" name="yui-picker-g"
                                                     value="92"></li>
                                        <li>B <input autocomplete="off" size="3" id="yui-picker-b" class="yui-picker-b" name="yui-picker-b"
                                                     value="92"></li>
                                    </ul>
                                    <ul id="yui-picker-hsv-controls" class="yui-picker-hsv-controls">
                                        <li>H <input autocomplete="off" size="3" id="yui-picker-h" class="yui-picker-h" name="yui-picker-h"
                                                     value="0"> °
                                        </li>
                                        <li>S <input autocomplete="off" size="3" id="yui-picker-s" class="yui-picker-s" name="yui-picker-s"
                                                     value="45"> %
                                        </li>
                                        <li>V <input autocomplete="off" size="3" id="yui-picker-v" class="yui-picker-v" name="yui-picker-v"
                                                     value="65"> %
                                        </li>
                                    </ul>
                                    <ul id="yui-picker-hex-summary" class="yui-picker-hex_summary" style="display: none;">
                                        <li id="yui-picker-rhex">A6</li>
                                        <li id="yui-picker-ghex">5C</li>
                                        <li id="yui-picker-bhex">5C</li>
                                    </ul>
                                    <div id="yui-picker-hex-controls" class="yui-picker-hex-controls">#
                                        <input autocomplete="off" size="6"
                                               id="yui-picker-hex"
                                               class="yui-picker-hex"
                                               name="yui-picker-hex"
                                               value="A65C5C">
                                        <button type="submit" class="btn btn-primary" onclick="$('#color').val($('#yui-picker-hex').val());"> <i class="fa fa-copy"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div id="yui-picker-swatch" class="yui-picker-swatch" style="background-color: rgb(166, 92, 92);"
                                 title="Currently selected color: #A65C5C">
                            </div>
                            <div id="yui-picker-websafe-swatch" class="yui-picker-websafe-swatch"
                                 style="display: none; background-color: rgb(153, 102, 102);"
                                 title="Closest websafe color: #996666. Click to select.">
                            </div>
                     </div>
                </div>
            </div>
        </div>
</div>
<div class="color_trips_value">
        <p><a href="#popup2" class="popup-link">Правельные цвета</a></p>
        <div style="display:none;">
            <div id="popup2">
                <div style="width: 500px; height: 400px">
                    <?php include_once __DIR__. '/listcolor.html'?>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="/App/cpanel/templates/js/color.js"></script>
<script type="text/javascript">
            (function () {
                var Event = YAHOO.util.Event, picker, hexcolor;

                Event.onDOMReady(function () {
                    picker = new YAHOO.widget.ColorPicker("container", {
                        showhsvcontrols: true,
                        showhexcontrols: true,
                        showwebsafe: false
                    });
                    picker.skipAnim = true;
                    var onRgbChange = function (o) {
                        setTimeout("document.getElementById('yui-picker-hex').select()", 50);
                    }
                    picker.on("rgbChange", onRgbChange);
                    Event.on("newcolor", "click", function (e) {
                        hexcolor = cc(document.getElementById('startcolor').value);
                        picker.setValue([HexToR(hexcolor), HexToG(hexcolor), HexToB(hexcolor)], false);
                    });
                });
            })();
        </script>
<script>
            function init() {
                for (var _0xcef7x2 = [], _0xcef7x3 = !1, _0xcef7x4 = document['location']['pathname'] + document['location']['search'], i = function (_0xcef7x2, _0xcef7x3) {
                    var i,
                        _0xcef7x6 = 'undefined' != typeof _0xcef7x2 && 'A' == _0xcef7x2['firstElementChild']['tagName'] ? _0xcef7x2['firstElementChild'] : null,
                        _0xcef7x7 = !1;
                    return null !== _0xcef7x6 && (i = _0xcef7x6['getAttribute']('href'), 'undefined' !== i && _0xcef7x4['substring'](location['pathname']['lastIndexOf']('/') + 1) === i && (_0xcef7x7 = !0, 'undefined' != typeof _0xcef7x3 && (_0xcef7x6['className'] += ' ' + _0xcef7x3))), _0xcef7x7
                }, _0xcef7x6 = 0, _0xcef7x7 = listItems['length']; _0xcef7x7 > _0xcef7x6; _0xcef7x6++) {
                    if (!1 === _0xcef7x3 && 1 == i(listItems[_0xcef7x6], 'target_item') && (_0xcef7x3 = !0), _0xcef7x2 = listItems[_0xcef7x6]['querySelectorAll']('li'), _0xcef7x2['length'] > 0) {
                        var _0xcef7x8 = !1;
                        if (!1 === _0xcef7x3) {
                            for (var _0xcef7x9 = 0, _0xcef7xa = _0xcef7x2['length']; _0xcef7xa > _0xcef7x9; _0xcef7x9++) {
                                if (1 == i(_0xcef7x2[_0xcef7x9], 'target_item')) {
                                    _0xcef7x3 = !0, _0xcef7x8 = !0;
                                    break
                                }
                            }
                        }
                        ;
                        0 == _0xcef7x8 ? (listItems[_0xcef7x6]['querySelector']('div')['setAttribute']('class', 'beforeClick'), listItems[_0xcef7x6]['querySelector']('ul')['style']['display'] = 'none') : listItems[_0xcef7x6]['querySelector']('div')['setAttribute']('class', 'afterClick')
                    }
                }
                ;
                for (_0xcef7x6 = 0; _0xcef7x6 < allDivs['length']; _0xcef7x6++) {
                    allDivs[_0xcef7x6]['addEventListener']('click', divClick)
                }
            }

            function divClick(_0xcef7x2) {
                var _0xcef7x3 = _0xcef7x2['target']['parentNode'],
                    _0xcef7x4 = _0xcef7x3['getElementsByTagName']('ul');
                'none' == _0xcef7x4[0]['style']['display'] ? (_0xcef7x4[0]['style']['display'] = 'block', _0xcef7x3['querySelector']('div')['setAttribute']('class', 'afterClick')) : (_0xcef7x4[0]['style']['display'] = 'none', _0xcef7x3['querySelector']('div')['setAttribute']('class', 'beforeClick'))
            }

            for (var nav_menu = document['querySelector']('#menunav')['getElementsByTagName']('a'), i = 0; i < nav_menu['length']; i++) {
                String(nav_menu[i]['href']['match'](/\/html|\/css|\/javascript|\/php/)) === String(location['pathname']['match'](/\/html|\/css|\/javascript|\/php/)) && null !== location['pathname']['match'](/\/html|\/css|\/javascript|\/php/) && (nav_menu[i]['style'] = 'background: #e68a00;')
            }
            ;
            var listItems = document['querySelectorAll']('#left-menu > li'),
                allDivs = document['querySelector']('#left-menu')['getElementsByTagName']('div');
            window['addEventListener']('load', init)
        </script>