
Ext.define('Rubedo.store.TrainingComments', {
    extend: 'Ext.data.Store',
    alias: 'store.TrainingComments',

    requires: [
        'Rubedo.model.TrainingComment',
        'Ext.data.proxy.Ajax',
        'Ext.data.reader.Json',
        'Ext.data.writer.Json'
    ],

    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
            autoLoad: true,
            autoSync: true,
            model: 'Rubedo.model.TrainingComment',
            storeId: 'TrainingComments',
            pageSize: 10000,
            proxy: {
                type: 'ajax',
                api: {
                    create: 'training-comments/create',
                    read: 'training-comments',
                    update: 'training-comments/update',
                    destroy: 'training-comments/delete'
                },
                reader: {
                    type: 'json',
                    messageProperty: 'message',
                    root: 'data'
                },
                writer: {
                    type: 'json',
                    encode: true,
                    root: 'data'
                }
            }
        }, cfg)]);
    }
});