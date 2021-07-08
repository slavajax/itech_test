<?php


namespace application\core;


class Lead
{
    //Ответственный за лид
    public $assignedById = 1;
    public $fields = [];


    public function __construct($fields)
    {
        $this->fields = [
            'TITLE' => sprintf('Заявка от %s %s', $fields['name'], $fields['surname']),
            'NAME' => $fields['name'],
            'LAST_NAME' => $fields['surname'],
            'EMAIL' => [['VALUE' => $fields['email'], 'VALUE_TYPE' => 'WORK']],
            'COMMENTS' => $fields['message'],
            'STATUS_ID' => 'NEW',
            'OPENED' => 'Y',
            'ASSIGNED_BY_ID' => $this->assignedById,
            'SOURCE_ID' => 'WEBFORM',
        ];
    }

    /**
     * Создать лида на портале
     * @return mixed|string
     */
    public function send()
    {
        $result = \CRest::call('crm.lead.add', [
            'fields' => $this->fields,
            'params' => ['REGISTER_SONET_EVENT' => 'N']
        ]);

        return $result['result'];
    }
}
