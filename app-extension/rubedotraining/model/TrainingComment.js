Ext.define('Rubedo.model.TrainingComment', {
    extend: 'Ext.data.Model',
    alias: 'model.TrainingComment',

    requires: [
        'Ext.data.Field'
    ],

    fields: [
        {
            name: 'id'
        },
        {
            name: 'version'
        },
        {
            name: 'comment'
        },{
            mapping: 'createUser.fullName',
            name: 'createUser',
            persist: false
        },
        {
            dateFormat: 'timestamp',
            name: 'createTime',
            persist: false,
            type: 'date'
        }

    ]
});