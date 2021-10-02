<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bricks extends CI_Controller {

    public function index() 
    {
        $data = array();
        $data['title'] = 'Dashboard';
        $data['last_customer'] = $this->bricks_model->select_last_customer();
        $data['last_sale'] = $this->bricks_model->select_last_sale();
        $data['all_bricks'] = $this->bricks_model->select_all_price();
        $data['current_balance'] = $this->bricks_model->select_current_balance();
        $data['all_customer_due'] = $this->bricks_model->select_all_customer_due();
        $data['all_contractor_due'] = $this->bricks_model->select_all_contractor_due();
        $data['dashboard'] = $this->load->view('dashboard', $data, true);
        $this->load->view('master', $data);
    }
    
    public function add_admin() 
    {
        $data = array();
        $data['title'] = 'Add Admin';
        $data['dashboard'] = $this->load->view('add_admin', $data, true);
        $this->load->view('master', $data);
    }

    public function save_admin()
    {
        $this->form_validation->set_rules('level', 'Panel', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('status', 'Status', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required');
        if ($this->form_validation->run() == False)
        {
            $data = array();
            $data['title'] = 'Password Did Not Match';
            $data['dashboard'] = $this->load->view('add_admin', $data, true);
            $this->load->view('master', $data);
        } 
        else 
        {
            $this->bricks_model->save_admin_info($data);
            $sdata = array();
            $sdata['save_admin'] = 'Admin Saved';
            $this->session->set_userdata($sdata);
            redirect('bricks/add_admin');
        }
    }

    public function manage_admin()
    {
        $data = array();
        $data['title'] = 'Manage Admin';
        $data['all_admin'] = $this->bricks_model->select_all_admin();
        $data['dashboard'] = $this->load->view('manage_admin', $data, true);
        $this->load->view('master', $data);
    }

    public function deactive_admin($admin_id) 
    {
        $this->bricks_model->deactive_admin_by_id($admin_id);
        redirect('bricks/manage_admin');
    }

    public function active_admin($admin_id)
    {
        $this->bricks_model->active_admin_by_id($admin_id);
        redirect('bricks/manage_admin');
    }

    public function edit_admin($admin_id) 
    {
        $data = array();
        $data['title'] = 'Edit Admin';
        $data['admin_info'] = $this->bricks_model->select_admin_by_id($admin_id);
        $data['dashboard'] = $this->load->view('edit_admin', $data, true);
        $sdata = array();
        $sdata['edit_admin'] = 'Update Admin Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_admin() 
    {
        $this->bricks_model->update_admin_info();
        redirect('bricks/manage_admin');
    }

    public function delete_admin($admin_id) 
    {
        $this->bricks_model->delete_admin_by_id($admin_id);
        redirect('bricks/manage_admin');
    }
    
    public function add_price()
    {
        $data = array();
        $data['title'] = 'New Price';
        $data['dashboard'] = $this->load->view('add_price', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_price()
    {
        $this->bricks_model->save_price_info();
        $sdata = array();
        $sdata['save_price'] = 'Price Saved';
        $this->session->set_userdata($sdata);
        redirect('bricks/add_price');
    }
    
    public function manage_price()
    {
        $data = array();
        $data['title'] = 'Manage Price';
        $data['all_price'] = $this->bricks_model->select_all_price();
        $data['dashboard'] = $this->load->view('manage_price', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_price($id) 
    {
        $data = array();
        $data['title'] = 'Edit Price';
        $data['price_info'] = $this->bricks_model->select_price_by_id($id);
        $data['dashboard'] = $this->load->view('edit_price', $data, true);
        $sdata = array();
        $sdata['edit_price'] = 'Update Price Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_price() 
    {
        $this->bricks_model->update_price_info();
        redirect('bricks/manage_price');
    }
    
    public function delete_price($id) 
    {
        $this->bricks_model->delete_price_by_id($id);
        redirect('bricks/manage_price');
    }

    public function add_debit()
    {
        $data = array();
        $data['title'] = 'New Debit';
        $data['current_balance'] = $this->bricks_model->select_current_balance();
        $data['all_debit_category'] = $this->bricks_model->select_all_debit_category();
        $data['dashboard'] = $this->load->view('add_debit', $data, true);        
        $this->load->view('master', $data);
    }
    
    public function save_debit()
    {
        $this->bricks_model->save_debit_info();
        $sdata = array();
        $sdata['save_debit'] = 'Execution Was Succeeded';
        $this->session->set_userdata($sdata);
        redirect('bricks/add_debit');
    }
    
    public function manage_debit()
    {
        $data = array();
        $data['title'] = 'Manage Debit';
        $data['all_debit'] = $this->bricks_model->select_all_debit();
        $data['dashboard'] = $this->load->view('manage_debit', $data, true);
        $this->load->view('master', $data);
    }
    
    public function add_debit_category()
    {
        $data = array();
        $data['title'] = 'New Debit Category';
        $data['dashboard'] = $this->load->view('add_debit_category', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_debit_category()
    {
        $this->bricks_model->save_debit_category_info();
        $sdata = array();
        $sdata['save_debit_category'] = 'Debit Category Saved';
        $this->session->set_userdata($sdata);
        redirect('bricks/add_debit_category');
    }
    
    public function manage_debit_category()
    {
        $data = array();
        $data['title'] = 'Manage Debit Category';
        $data['all_debit_category'] = $this->bricks_model->select_all_debit_category();
        $data['dashboard'] = $this->load->view('manage_debit_category', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_debit_category($id) 
    {
        $data = array();
        $data['title'] = 'Edit Debit Category';
        $data['debit_category_info'] = $this->bricks_model->select_debit_category_by_id($id);
        $data['dashboard'] = $this->load->view('edit_debit_category', $data, true);
        $sdata = array();
        $sdata['edit_debit_category'] = 'Update Debit Category Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_debit_category() 
    {
        $this->bricks_model->update_debit_category_info();
        redirect('bricks/manage_debit_category');
    }
    
    public function delete_debit_category($id) 
    {
        $this->bricks_model->delete_debit_category_by_id($id);
        redirect('bricks/manage_debit_category');
    }

    public function add_credit()
    {
        $data = array();
        $data['title'] = 'New Credit';
        $data['current_balance'] = $this->bricks_model->select_current_balance();
        $data['all_credit_category'] = $this->bricks_model->select_all_credit_category();
        $data['dashboard'] = $this->load->view('add_credit', $data, true);        
        $this->load->view('master', $data);
    }
    
    public function save_credit()
    {
        $this->bricks_model->save_credit_info();
        $sdata = array();
        $sdata['save_credit'] = 'Execution Was Succeeded';
        $this->session->set_userdata($sdata);
        redirect('bricks/add_credit');
    }
    
    public function manage_credit()
    {
        $data = array();
        $data['title'] = 'Manage Credit';
        $data['all_credit'] = $this->bricks_model->select_all_credit();
        $data['dashboard'] = $this->load->view('manage_credit', $data, true);
        $this->load->view('master', $data);
    }
    
    public function add_credit_category()
    {
        $data = array();
        $data['title'] = 'New Credit Category';
        $data['dashboard'] = $this->load->view('add_credit_category', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_credit_category()
    {
        $this->bricks_model->save_credit_category_info();
        $sdata = array();
        $sdata['save_credit_category'] = 'Credit Category Saved';
        $this->session->set_userdata($sdata);
        redirect('bricks/add_credit_category');
    }
    
    public function manage_credit_category()
    {
        $data = array();
        $data['title'] = 'Manage Credit Category';
        $data['all_credit_category'] = $this->bricks_model->select_all_credit_category();
        $data['dashboard'] = $this->load->view('manage_credit_category', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_credit_category($id) 
    {
        $data = array();
        $data['title'] = 'Edit Credit Category';
        $data['credit_category_info'] = $this->bricks_model->select_credit_category_by_id($id);
        $data['dashboard'] = $this->load->view('edit_credit_category', $data, true);
        $sdata = array();
        $sdata['edit_credit_category'] = 'Update Credit Category Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_credit_category() 
    {
        $this->bricks_model->update_credit_category_info();
        redirect('bricks/manage_credit_category');
    }
    
    public function delete_credit_category($id) 
    {
        $this->bricks_model->delete_credit_category_by_id($id);
        redirect('bricks/manage_credit_category');
    }

    public function manage_cashbook()
    {
        $data = array();
        $data['title'] = 'Cashbook';
        $data['all_cashbook'] = $this->bricks_model->select_all_cashbook();
        $data['dashboard'] = $this->load->view('manage_cashbook', $data, true);
        $this->load->view('master', $data);
    }
    
    public function add_contractor_category()
    {
        $data = array();
        $data['title'] = 'New Contractor Category';
        $data['dashboard'] = $this->load->view('add_contractor_category', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_contractor_category()
    {
        $this->bricks_model->save_contractor_category_info();
        $sdata = array();
        $sdata['save_contractor_category'] = 'Contractor Category Saved';
        $this->session->set_userdata($sdata);
        redirect('bricks/add_contractor_category');
    }
    
    public function manage_contractor_category()
    {
        $data = array();
        $data['title'] = 'Manage Contractor Category';
        $data['all_contractor_category'] = $this->bricks_model->select_all_contractor_category();
        $data['dashboard'] = $this->load->view('manage_contractor_category', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_contractor_category($id) 
    {
        $data = array();
        $data['title'] = 'Edit Contractor Category';
        $data['contractor_category_info'] = $this->bricks_model->select_contractor_category_by_id($id);
        $data['dashboard'] = $this->load->view('edit_contractor_category', $data, true);
        $sdata = array();
        $sdata['edit_contractor_category'] = 'Update Contractor Category Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_contractor_category() 
    {
        $this->bricks_model->update_contractor_category_info();
        redirect('bricks/manage_contractor_category');
    }
    
    public function delete_contractor_category($id) 
    {
        $this->bricks_model->delete_contractor_category_by_id($id);
        redirect('bricks/manage_contractor_category');
    }
    
    public function add_contractor()
    {
        $data = array();
        $data['title'] = 'New Contractor';
        $data['all_contractor_category'] = $this->bricks_model->select_all_contractor_category();
        $data['dashboard'] = $this->load->view('add_contractor', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_contractor()
    {
        $this->bricks_model->save_contractor_info();
        $sdata = array();
        $sdata['save_contractor'] = 'Contractor Saved';
        $this->session->set_userdata($sdata);
        redirect('bricks/add_contractor');
    }
    
    public function manage_contractor()
    {
        $data = array();
        $data['title'] = 'Manage Contractor';
        $data['all_contractor'] = $this->bricks_model->select_all_contractor();
        $data['dashboard'] = $this->load->view('manage_contractor', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_contractor($contractor_id) 
    {
        $data = array();
        $data['title'] = 'Edit Contractor';
        $data['all_contractor_category'] = $this->bricks_model->select_all_contractor_category();
        $data['contractor_info'] = $this->bricks_model->select_contractor_by_id($contractor_id);
        $data['dashboard'] = $this->load->view('edit_contractor', $data, true);
        $sdata = array();
        $sdata['edit_contractor'] = 'Update Contractor Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_contractor() 
    {
        $this->bricks_model->update_contractor_info();
        redirect('bricks/manage_contractor');
    }
    
    public function delete_contractor($contractor_id) 
    {
        $this->bricks_model->delete_contractor_by_id($contractor_id);
        redirect('bricks/manage_contractor');
    }
    
    public function all_contractor_transaction($contractor_id) 
    {
        $data = array();
        $data['title'] = 'Contractor Transaction';
        $data['transaction_info'] = $this->bricks_model->select_contractor_transaction_by_id($contractor_id);
        $data['dashboard'] = $this->load->view('contractor_transaction', $data, true);
        $this->load->view('master', $data);
    }
    
    public function add_contractor_transaction()
    {
        $data = array();
        $data['title'] = 'New Transaction';
        $data['current_balance'] = $this->bricks_model->select_current_balance();
        $data['all_contractor'] = $this->bricks_model->select_all_contractor();
        $data['dashboard'] = $this->load->view('add_contractor_transaction', $data, true);
        $this->load->view('master', $data);
    }
    
    public function contractor_due($id) 
    {
        $data = array();
        $data['contractor_info'] = $this->bricks_model->select_contractor_by_id($id);
        echo $this->load->view('contractor_due', $data, true);
    }
    
    public function save_contractor_transaction()
    {
        $this->bricks_model->save_contractor_transaction_info();
        $sdata = array();
        $sdata['save_contractor_transaction'] = 'Transaction Saved';
        $this->session->set_userdata($sdata);
        redirect('bricks/add_contractor_transaction');
    }
    
    public function manage_contractor_transaction()
    {
        $data = array();
        $data['title'] = 'Manage Transaction';
        $data['all_transaction'] = $this->bricks_model->select_all_contractor_transaction();
        $data['dashboard'] = $this->load->view('manage_contractor_transaction', $data, true);
        $this->load->view('master', $data);
    }
     
    public function manage_customer()
    {
        $data = array();
        $data['title'] = 'Manage Customer';
        $data['all_customer'] = $this->bricks_model->select_all_customer();
        $data['dashboard'] = $this->load->view('manage_customer', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_customer($customer_id) 
    {
        $data = array();
        $data['title'] = 'Edit Customer';
        $data['customer_info'] = $this->bricks_model->select_customer_by_id($customer_id);
        $data['dashboard'] = $this->load->view('edit_customer', $data, true);
        $sdata = array();
        $sdata['edit_customer'] = 'Update Customer Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_customer() 
    {
        $this->bricks_model->update_customer_info();
        redirect('bricks/manage_customer');
    }
    
    public function delete_customer($customer_id) 
    {
        $this->bricks_model->delete_customer_by_id($customer_id);
        redirect('bricks/manage_customer');
    }
    
    public function all_customer_transaction($customer_id) 
    {
        $data = array();
        $data['title'] = 'Customer Transaction';
        $data['transaction_info'] = $this->bricks_model->select_customer_transaction_by_id($customer_id);
        $data['dashboard'] = $this->load->view('customer_transaction', $data, true);
        $this->load->view('master', $data);
    }
    
    public function all_customer_sales($customer_id) 
    {
        $data = array();
        $data['title'] = 'Customer Sales';
        $data['all_sale'] = $this->bricks_model->select_all_customer_sale_by_id($customer_id);
        $data['dashboard'] = $this->load->view('customer_sale', $data, true);
        $this->load->view('master', $data);
    }

    public function add_customer_transaction()
    {
        $data = array();
        $data['title'] = 'New Transaction';
        $data['current_balance'] = $this->bricks_model->select_current_balance();
        $data['all_customer'] = $this->bricks_model->select_all_customer();
        $data['dashboard'] = $this->load->view('add_customer_transaction', $data, true);
        $this->load->view('master', $data);
    }
    
    public function customer_due($id) 
    {
        $data = array();
        $data['customer_info'] = $this->bricks_model->select_customer_by_id($id);
        echo $this->load->view('customer_due', $data, true);
    }
    
    public function save_customer_transaction()
    {
        $this->bricks_model->save_customer_transaction_info();
        $sdata = array();
        $sdata['save_customer_transaction'] = 'Transaction Saved';
        $this->session->set_userdata($sdata);
        redirect('bricks/add_customer_transaction');
    }
    
    public function manage_customer_transaction()
    {
        $data = array();
        $data['title'] = 'Manage Transaction';
        $data['all_transaction'] = $this->bricks_model->select_all_customer_transaction();
        $data['dashboard'] = $this->load->view('manage_customer_transaction', $data, true);
        $this->load->view('master', $data);
    }

    public function select_bricks_price($id) 
    {
        $data = array();
        $data['bricks_price'] = $this->bricks_model->select_price_by_id($id);
        echo $this->load->view('bricks_price', $data, true);
    }
    
    public function search_ref($ref_number) 
    {
        $data = array();
        $data['due_invoice'] = $this->bricks_model->search_ref_invoice($ref_number);
        echo $this->load->view('due_invoice', $data, true);
    }
    
    public function old_sale()
    {
        $data = array();
        $data['title'] = 'Old Sale';
        $data['all_customer'] = $this->bricks_model->select_all_customer();
        $data['last_customer'] = $this->bricks_model->select_last_customer();
        $data['last_sale'] = $this->bricks_model->select_last_sale();
        $data['all_bricks'] = $this->bricks_model->select_all_price();
        $data['current_balance'] = $this->bricks_model->select_current_balance();
        $data['dashboard'] = $this->load->view('old_sale', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_old_sale()
    {
        $this->bricks_model->save_old_sale_info();
        redirect('bricks/last_sale');
    }
    
    public function add_sale()
    {
        $data = array();
        $data['title'] = 'New Sale';
        $data['all_customer'] = $this->bricks_model->select_all_customer();
        $data['last_customer'] = $this->bricks_model->select_last_customer();
        $data['last_sale'] = $this->bricks_model->select_last_sale();
        $data['all_bricks'] = $this->bricks_model->select_all_price();
        $data['current_balance'] = $this->bricks_model->select_current_balance();
        $data['dashboard'] = $this->load->view('add_sale', $data, true);
        $this->load->view('master', $data);
    }
        
    public function save_sale()
    {
        $this->bricks_model->save_sale_info();
        redirect('bricks/last_sale');
    }
    
    public function last_sale()
    {
        $data = array();
        $data['title'] = 'Sale Details';
        $data['sale_detail'] = $this->bricks_model->select_last_sale();
        $data['dashboard'] = $this->load->view('sale_detail', $data, true);
        $this->load->view('master', $data);
    }
    
    public function manage_sale()
    {
        $data = array();
        $data['title'] = 'Manage Sale';
        $data['all_sale'] = $this->bricks_model->select_all_sale();
        $data['dashboard'] = $this->load->view('manage_sale', $data, true);
        $this->load->view('master', $data);
    }
    
    public function sale_detail($sale_id)
    {
        $data = array();
        $data['title'] = 'Sale Details';
        $data['sale_detail'] = $this->bricks_model->select_sale_detail($sale_id);
        $data['dashboard'] = $this->load->view('sale_detail', $data, true);
        $this->load->view('master', $data);
    }
    
    public function add_employee()
    {
        $data = array();
        $data['title'] = 'New Employee';
        $data['dashboard'] = $this->load->view('add_employee', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_employee()
    {
        $this->bricks_model->save_employee_info();
        $sdata = array();
        $sdata['save_employee'] = 'Employee Saved';
        $this->session->set_userdata($sdata);
        redirect('bricks/add_employee');
    }
    
    public function manage_employee()
    {
        $data = array();
        $data['title'] = 'Manage Employee';
        $data['all_employee'] = $this->bricks_model->select_all_employee();
        $data['dashboard'] = $this->load->view('manage_employee', $data, true);
        $this->load->view('master', $data);
    }
 
    public function all_employee_transaction($employee_id) 
    {
        $data = array();
        $data['title'] = 'Employee Transaction';
        $data['transaction_info'] = $this->bricks_model->select_employee_transaction_by_id($employee_id);
        $data['dashboard'] = $this->load->view('employee_transaction', $data, true);
        $this->load->view('master', $data);
    }

    public function edit_employee($employee_id) 
    {
        $data = array();
        $data['title'] = 'Edit Employee';
        $data['employee_info'] = $this->bricks_model->select_employee_by_id($employee_id);
        $data['dashboard'] = $this->load->view('edit_employee', $data, true);
        $sdata = array();
        $sdata['edit_employee'] = 'Update Employee Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_employee() 
    {
        $this->bricks_model->update_employee_info();
        redirect('bricks/manage_employee');
    }
    
    public function delete_employee($employee_id) 
    {
        $this->bricks_model->delete_employee_by_id($employee_id);
        redirect('bricks/manage_employee');
    }
    
    public function add_salary()
    {
        $data = array();
        $data['title'] = 'Add New Salary';
        $data['current_balance'] = $this->bricks_model->select_current_balance();
        $data['all_employee'] = $this->bricks_model->select_all_employee();
        $data['dashboard'] = $this->load->view('add_salary', $data, true);
        $this->load->view('master', $data);
    }
    
    public function employee_due($id) 
    {
        $data = array();
        $data['employee_info'] = $this->bricks_model->select_employee_by_id($id);
        echo $this->load->view('employee_due', $data, true);
    }
    
    public function save_salary()
    {
        $this->bricks_model->save_salary_info();
        $sdata = array();
        $sdata['save_salary'] = 'Salary Saved';
        $this->session->set_userdata($sdata);
        redirect('bricks/add_salary');
    }
    
    public function manage_salary()
    {
        $data = array();
        $data['title'] = 'Manage Salary';
        $data['all_salary'] = $this->bricks_model->select_all_salary();
        $data['dashboard'] = $this->load->view('manage_salary', $data, true);
        $this->load->view('master', $data);
    }
    
    public function credit_report()
    {
        $data = array();
        $data['title'] = 'Credit Report';
        $data['dashboard'] = $this->load->view('credit_report', $data, true);
        $this->load->view('master', $data);
    }
    
    public function search_credit_report()
    {
        $data = array();
        $data['title'] = 'Credit Report';
        $from = $this->input->post('from', true);
        $to = $this->input->post('to', true);
        $sdata = array();
        $sdata['from'] = $from;
        $sdata['to'] = $to;
        $this->session->set_userdata($sdata);
        $data['credit_report_info'] = $this->bricks_model->select_credit_report_info($from,$to);        
        $data['total_credit'] = $this->bricks_model->select_total_credit($from,$to);
        $data['dashboard'] = $this->load->view('search_credit_report', $data, true);
        $this->load->view('master', $data);
    }
    
    public function download_credit_report()
    {
        $from = $this->session->userdata('from');
        $to = $this->session->userdata('to');
        $data = array();
        $data['credit_report_info'] = $this->bricks_model->select_credit_report_info($from,$to);        
        $data['total_credit'] = $this->bricks_model->select_total_credit($from,$to);
        $this->load->view('download_credit_report', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("download_credit_report.pdf");
    }
    
    public function debit_report()
    {
        $data = array();
        $data['title'] = 'Debit Report';
        $data['dashboard'] = $this->load->view('debit_report', $data, true);
        $this->load->view('master', $data);
    }
    
    public function search_debit_report()
    {
        $data = array();
        $data['title'] = 'Debit Report';
        $from = $this->input->post('from', true);
        $to = $this->input->post('to', true);
        $sdata = array();
        $sdata['from'] = $from;
        $sdata['to'] = $to;
        $this->session->set_userdata($sdata);
        $data['debit_report_info'] = $this->bricks_model->select_debit_report_info($from,$to);        
        $data['total_debit'] = $this->bricks_model->select_total_debit($from,$to);
        $data['dashboard'] = $this->load->view('search_debit_report', $data, true);
        $this->load->view('master', $data);
    }
    
    public function download_debit_report()
    {
        $from = $this->session->userdata('from');
        $to = $this->session->userdata('to');
        $data = array();
        $data['debit_report_info'] = $this->bricks_model->select_debit_report_info($from,$to);        
        $data['total_debit'] = $this->bricks_model->select_total_debit($from,$to);
        $this->load->view('download_debit_report', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("download_debit_report.pdf");
    }

    public function cashbook_report()
    {
        $data = array();
        $data['title'] = 'Cashbook Report';
        $data['dashboard'] = $this->load->view('cashbook_report', $data, true);
        $this->load->view('master', $data);
    }
    
    public function search_cashbook_report()
    {
        $data = array();
        $data['title'] = 'Cashbook Report';
        $from = $this->input->post('from', true);
        $to = $this->input->post('to', true);
        $sdata = array();
        $sdata['from'] = $from;
        $sdata['to'] = $to;
        $this->session->set_userdata($sdata); 
        $data['total_credit'] = $this->bricks_model->select_total_credit($from,$to);       
        $data['total_debit'] = $this->bricks_model->select_total_debit($from,$to);       
        $data['total_cashbook'] = $this->bricks_model->select_cashbook_report($from,$to);
        $data['dashboard'] = $this->load->view('search_cashbook_report', $data, true);
        $this->load->view('master', $data);
    }
    
    public function download_cashbook_report()
    {
        $from = $this->session->userdata('from');
        $to = $this->session->userdata('to');
        $data = array();
        $data['debit_report_info'] = $this->bricks_model->select_debit_report_info($from,$to);        
        $data['total_debit'] = $this->bricks_model->select_total_debit($from,$to);       
        $data['debit_report_info'] = $this->bricks_model->select_debit_report_info($from,$to);        
        $data['total_debit'] = $this->bricks_model->select_total_debit($from,$to);       
        $this->load->view('download_cashbook_report', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("download_cashbook_report.pdf");
    }
}