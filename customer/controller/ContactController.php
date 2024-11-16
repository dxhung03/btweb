<?php
require_once '../model/Contact.php';

class ContactController {
    private $contactModel;

    public function __construct() {
        $this->contactModel = new ContactModel();
    }
    public function saveContact($data) {
        $fullName = $data['fullName'] ?? '';
        $company = $data['company'] ?? '';
        $address = $data['address'] ?? '';
        $email = $data['email'] ?? '';
        $website = $data['website'] ?? '';
        $phone = $data['phone'] ?? '';
        $fax = $data['fax'] ?? '';

        return $this->contactModel->saveContact($fullName, $company, $address, $email, $website, $phone, $fax);
    }
}
