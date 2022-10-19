
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap material admin template">
    <meta name="author" content="">
    
    <title>Pendaftaran Toefl UNIPMA</title>
    
    <link rel="apple-touch-icon" href="<?= base_url() ?>/docs/themeforest/base/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="<?= base_url() ?>/docs/themeforest/base/assets/images/favicon.ico">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/base/assets/css/site.min.css">
    
    <!-- Plugins -->
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/waves/waves.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/fullcalendar/fullcalendar.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/bootstrap-touchspin/bootstrap-touchspin.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/jquery-selective/jquery-selective.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/base/assets/examples/css/apps/calendar.css">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/fonts/material-design/material-design.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    
    <!-- Scripts -->
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
      Breakpoints();
    </script>
  </head>
  <body class="animsition app-calendar page-aside-left">

    <?= $this->include("Admin/layout/nav") ?>

    <?= $this->include("Admin/layout/sidebar") ?>

    <div class="page">
      <div class="page-aside">
        <div class="page-aside-switch">
          <i class="icon md-chevron-left" aria-hidden="true"></i>
          <i class="icon md-chevron-right" aria-hidden="true"></i>
        </div>
        <div class="page-aside-inner page-aside-scroll">
          <div data-role="container">
            <div data-role="content">
              <section class="page-aside-section">
                <h5 class="page-aside-title">Timeline Magang</h5>
                <div class="list-group calendar-list">
                	<?php foreach ($peserta as $value) { ?>
	                  <a class="list-group-item calendar-event" data-title="<?= $value['nama_siswa'] ?>" data-stick=true
	                    data-color="cyan-600" href="javascript:void(0)">
	                    <i class="md-circle cyan-600 mr-10" aria-hidden="true"></i><?= $value['nama_siswa'] ?>
	                  </a>
                	<?php } ?>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
      <div class="page-main">
        <div class="calendar-container">
          <div id="calendar"></div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?= $this->include("Admin/layout/footer") ?>
    <!-- Core  -->
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/popper-js/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/bootstrap/bootstrap.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/animsition/animsition.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/asscrollable/jquery-asScrollable.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/waves/waves.js"></script>
    
    <!-- Plugins -->
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/switchery/switchery.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/intro-js/intro.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/screenfull/screenfull.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/slidepanel/jquery-slidePanel.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/fullcalendar/fullcalendar.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/jquery-selective/jquery-selective.min.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/bootstrap-touchspin/bootstrap-touchspin.min.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/bootbox/bootbox.js"></script>
    
    <!-- Scripts -->
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Component.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Base.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Config.js"></script>
    
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Section/Menubar.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Section/GridMenu.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Section/Sidebar.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Section/PageAside.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Plugin/menu.js"></script>
    
    <script src="<?= base_url() ?>/docs/themeforest/global/js/config/colors.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/config/tour.js"></script>
    <script>Config.set('assets', '<?= base_url() ?>/docs/themeforest/base/assets');</script>
    
    <!-- Page -->
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Site.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/asscrollable.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/slidepanel.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/switchery.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/bootstrap-touchspin.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/bootstrap-datepicker.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/material.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/action-btn.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/editlist.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/bootbox.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Site.js"></script>

    <script type="text/javascript">
    	(function (global, factory) {
		  if (typeof define === "function" && define.amd) {
		    define("/App/Calendar", ["exports", "Site", "Config"], factory);
		  } else if (typeof exports !== "undefined") {
		    factory(exports, require("Site"), require("Config"));
		  } else {
		    var mod = {
		      exports: {}
		    };
		    factory(mod.exports, global.Site, global.Config);
		    global.AppCalendar = mod.exports;
		  }
		})(this, function (_exports, _Site2, _Config) {
		  "use strict";

		  Object.defineProperty(_exports, "__esModule", {
		    value: true
		  });
		  _exports.run = run;
		  _exports.getInstance = getInstance;
		  _exports.default = _exports.AppCalendar = void 0;
		  _Site2 = babelHelpers.interopRequireDefault(_Site2);

		  var tanggal = "<?= date('Y/m/d') ?>";
		  var AppCalendar =
		  /*#__PURE__*/
		  function (_Site) {
		    babelHelpers.inherits(AppCalendar, _Site);

		    function AppCalendar() {
		      babelHelpers.classCallCheck(this, AppCalendar);
		      return babelHelpers.possibleConstructorReturn(this, babelHelpers.getPrototypeOf(AppCalendar).apply(this, arguments));
		    }

		    babelHelpers.createClass(AppCalendar, [{
		      key: "initialize",
		      value: function initialize() {
		        babelHelpers.get(babelHelpers.getPrototypeOf(AppCalendar.prototype), "initialize", this).call(this);
		        this.$actionToggleBtn = $('.site-action-toggle');
		        this.$addNewCalendarForm = $('#addNewCalendar').modal({
		          show: false
		        });
		      }
		    }, {
		      key: "process",
		      value: function process() {
		        babelHelpers.get(babelHelpers.getPrototypeOf(AppCalendar.prototype), "process", this).call(this);
		        this.handleFullcalendar();
		        this.handleSelective();
		        this.handleAction();
		        this.handleListItem();
		        this.handleEventList();
		      }
		    }, {
		      key: "handleFullcalendar",
		      value: function handleFullcalendar() {
		        var myEvents = [
		        <?php foreach($peserta as $value) { ?>
		        {
		          title: '<?= $value['nama_siswa'] ?>',
		          start: "<?= $value['waktu_mulai'] ?>",
		          end: "<?= $value['waktu_selesai'] ?>",
		          backgroundColor: (0, _Config.colors)('cyan', 600),
		          borderColor: (0, _Config.colors)('cyan', 600)
		        },
		        <?php } ?>];
		        var myOptions = {
		          header: {
		            left: null,
		            center: 'prev,title,next',
		            right: 'month,agendaWeek,agendaDay'
		          },
		          defaultDate: tanggal,
		          selectable: true,
		          selectHelper: true,
		          select: function select() {
		            $('#addNewEvent').modal('show');
		          },
		          editable: true,
		          eventLimit: true,
		          windowResize: function windowResize(view) {
		            var width = $(window).outerWidth();
		            var options = Object.assign({}, myOptions);
		            options.events = view.calendar.clientEvents();
		            options.aspectRatio = width < 667 ? 0.5 : 1.35;
		            $('#calendar').fullCalendar('destroy');
		            $('#calendar').fullCalendar(options);
		          },
		          eventClick: function eventClick(event) {
		            var color = event.backgroundColor ? event.backgroundColor : (0, _Config.colors)('blue', 600);
		            $('#editEname').val(event.title);

		            if (event.start) {
		              $('#editStarts').datepicker('update', event.start._d);
		            } else {
		              $('#editStarts').datepicker('update', '');
		            }

		            if (event.end) {
		              $('#editEnds').datepicker('update', event.end._d);
		            } else {
		              $('#editEnds').datepicker('update', '');
		            }

		            $('#editColor [type=radio]').each(function () {
		              var $this = $(this);

		              var _value = $this.data('color').split('|');

		              var value = (0, _Config.colors)(_value[0], _value[1]);

		              if (value === color) {
		                $this.prop('checked', true);
		              } else {
		                $this.prop('checked', false);
		              }
		            });
		            $('#editNewEvent').modal('show').one('hidden.bs.modal', function (e) {
		              event.title = $('#editEname').val();
		              var color = $('#editColor [type=radio]:checked').data('color').split('|');
		              color = (0, _Config.colors)(color[0], color[1]);
		              event.backgroundColor = color;
		              event.borderColor = color;
		              event.start = new Date($('#editStarts').data('datepicker').getDate());
		              event.end = new Date($('#editEnds').data('datepicker').getDate());
		              $('#calendar').fullCalendar('updateEvent', event);
		            });
		          },
		          eventDragStart: function eventDragStart() {
		            $('.site-action').data('actionBtn').show();
		          },
		          eventDragStop: function eventDragStop() {
		            $('.site-action').data('actionBtn').hide();
		          },
		          events: myEvents,
		          droppable: true
		        };

		        var _options;

		        var myOptionsMobile = Object.assign({}, myOptions);
		        myOptionsMobile.aspectRatio = 0.5;
		        _options = $(window).outerWidth() < 667 ? myOptionsMobile : myOptions;
		        $('#editNewEvent').modal();
		        $('#calendar').fullCalendar(_options);
		      }
		    }, {
		      key: "handleSelective",
		      value: function handleSelective() {
		        var member = [{
		          id: 'uid_1',
		          name: 'Herman Beck',
		          avatar: '<?= base_url() ?>/docs/themeforest/global/portraits/1.jpg'
		        }, {
		          id: 'uid_2',
		          name: 'Mary Adams',
		          avatar: '<?= base_url() ?>/docs/themeforest/global/portraits/2.jpg'
		        }, {
		          id: 'uid_3',
		          name: 'Caleb Richards',
		          avatar: '<?= base_url() ?>/docs/themeforest/global/portraits/3.jpg'
		        }, {
		          id: 'uid_4',
		          name: 'June Lane',
		          avatar: '<?= base_url() ?>/docs/themeforest/global/portraits/4.jpg'
		        }];
		        var items = [{
		          id: 'uid_1',
		          name: 'Herman Beck',
		          avatar: '<?= base_url() ?>/docs/themeforest/global/portraits/1.jpg'
		        }, {
		          id: 'uid_2',
		          name: 'Caleb Richards',
		          avatar: '<?= base_url() ?>/docs/themeforest/global/portraits/2.jpg'
		        }];
		        $('.plugin-selective').selective({
		          namespace: 'addMember',
		          local: member,
		          selected: items,
		          buildFromHtml: false,
		          tpl: {
		            optionValue: function optionValue(data) {
		              return data.id;
		            },
		            frame: function frame() {
		              return "<div class=\"".concat(this.namespace, "\">\n          ").concat(this.options.tpl.items.call(this), "\n          <div class=\"").concat(this.namespace, "-trigger\">\n          ").concat(this.options.tpl.triggerButton.call(this), "\n          <div class=\"").concat(this.namespace, "-trigger-dropdown\">\n          ").concat(this.options.tpl.list.call(this), "\n          </div>\n          </div>\n          </div>");
		            },
		            triggerButton: function triggerButton() {
		              return "<div class=\"".concat(this.namespace, "-trigger-button\"><i class=\"md-plus\"></i></div>");
		            },
		            listItem: function listItem(data) {
		              return "<li class=\"".concat(this.namespace, "-list-item\"><img class=\"avatar\" src=\"").concat(data.avatar, "\">").concat(data.name, "</li>");
		            },
		            item: function item(data) {
		              return "<li class=\"".concat(this.namespace, "-item\"><img class=\"avatar\" src=\"").concat(data.avatar, "\" title=\"").concat(data.name, "\">").concat(this.options.tpl.itemRemove.call(this), "</li>");
		            },
		            itemRemove: function itemRemove() {
		              return "<span class=\"".concat(this.namespace, "-remove\"><i class=\"md-minus-circle\"></i></span>");
		            },
		            option: function option(data) {
		              return "<option value=\"".concat(this.options.tpl.optionValue.call(this, data), "\">").concat(data.name, "</option>");
		            }
		          }
		        });
		      }
		    }, {
		      key: "handleAction",
		      value: function handleAction() {
		        var _this = this;

		        this.$actionToggleBtn.on('click', function (e) {
		          _this.$addNewCalendarForm.modal('show');

		          e.stopPropagation();
		        });
		      }
		    }, {
		      key: "handleEventList",
		      value: function handleEventList() {
		        $('#addNewEventBtn').on('click', function () {
		          $('#addNewEvent').modal('show');
		        });
		        $('.calendar-list .calendar-event').each(function () {
		          var $this = $(this);
		          var color = $this.data('color').split('-');
		          $this.data('event', {
		            title: $this.data('title'),
		            stick: $this.data('stick'),
		            backgroundColor: (0, _Config.colors)(color[0], color[1]),
		            borderColor: (0, _Config.colors)(color[0], color[1])
		          });
		          $this.draggable({
		            zIndex: 999,
		            revert: true,
		            revertDuration: 0,
		            appendTo: '.page',
		            helper: function helper() {
		              return "<a class=\"fc-day-grid-event fc-event fc-start fc-end\" style=\"background-color:".concat((0, _Config.colors)(color[0], color[1]), ";border-color:").concat((0, _Config.colors)(color[0], color[1]), "\">\n          <div class=\"fc-content\">\n            <span class=\"fc-title\">").concat($this.data('title'), "</span>\n          </div>\n          </a>");
		            }
		          });
		        });
		      }
		    }, {
		      key: "handleListItem",
		      value: function handleListItem() {
		        this.$actionToggleBtn.on('click', function (e) {
		          $('#addNewCalendar').modal('show');
		          e.stopPropagation();
		        });
		        $(document).on('click', '[data-tag=list-delete]', function (e) {
		          bootbox.dialog({
		            message: 'Do you want to delete the calendar?',
		            buttons: {
		              success: {
		                label: 'Delete',
		                className: 'btn-danger',
		                callback: function callback() {// $(e.target).closest('.list-group-item').remove();
		                }
		              }
		            }
		          });
		        });
		      }
		    }]);
		    return AppCalendar;
		  }(_Site2.default);

		  _exports.AppCalendar = AppCalendar;
		  var instance = null;

		  function getInstance() {
		    if (!instance) {
		      instance = new AppCalendar();
		    }

		    return instance;
		  }

		  function run() {
		    var app = getInstance();
		    app.run();
		  }

		  var _default = AppCalendar;
		  _exports.default = _default;
		});
    </script>

    <script src="<?= base_url() ?>/docs/themeforest/base/assets/examples/js/apps/calendar.js"></script>
    
  </body>
</html>
