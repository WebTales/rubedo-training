
Ext.define('Rubedo.view.TrainingCommentsInterface', {
    extend: 'Ext.window.Window',
    alias: 'widget.TrainingCommentsInterface',


    height: 456,
    id: 'TrainingCommentsInterface',
    width: 930,
    constrainHeader: true,
    iconCls: 'process-icon',
    title: 'Comments',

    layout: {
        type: 'hbox',
        align: 'stretch'
    },

    initComponent: function() {
        var me = this;

        Ext.applyIf(me, {

            items:[
                {
                    xtype:"gridpanel",
                    dockedItems:[
                        {
                            xtype: 'toolbar',
                            dock: 'top',
                            items: [{
                                xtype: 'button',
                                text: 'Delete',
                                iconCls:"close",
                                handler:function(button){
                                    var comment=button.up().up().getSelectionModel().getLastSelected();
                                    if(comment){
                                        button.up().up().getStore().remove(comment);
                                    }
                                }
                                }
                            ]
                        }],
                    flex:1,
                    store:"TrainingComments",
                    columns: [
                        {xtype: 'rownumberer'},
                        { text: 'Comment',  dataIndex: 'comment',flex:3 },
                        { text: 'Author',  dataIndex: 'createUser',flex:1 }
                    ]
                }
            ]

        });


        me.callParent(arguments);
    }



});