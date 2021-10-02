<?php

class Bricks_model extends CI_Model {

    public function select_current_balance()
    {
        $sql = "SELECT * FROM tbl_cashbook ORDER BY cashbook_id DESC LIMIT 1";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_all_customer_due()
    {
        $sql = "SELECT SUM(due_amount) AS customer_due FROM tbl_customer";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_all_contractor_due()
    {
        $sql = "SELECT SUM(due_amount) AS contractor_due FROM tbl_contractor";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function save_admin_info()
    {
        $data = array();
        $data['admin_name'] = $this->input->post('name', true);
        $data['admin_email'] = $this->input->post('email', true);
        $data['admin_password'] = $this->input->post('password', true);
        $data['admin_registration_date'] = $this->input->post('time', true);
        $data['admin_level'] = $this->input->post('level', true);
        $data['admin_status'] = $this->input->post('status', true);
        $this->db->insert('tbl_admin',$data);
    }
    
    public function select_all_admin()
    {
        $sql = "SELECT * FROM tbl_admin";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function deactive_admin_by_id($admin_id)
    {
        $this->db->set('admin_status',0);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_admin');
    }
    
    public function active_admin_by_id($admin_id)
    {
        $this->db->set('admin_status',1);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_admin');
    }
    
    public function select_admin_by_id($admin_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id',$admin_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_admin_info()
    {
        $data=array();
        $data['admin_name'] = $this->input->post('name', true);
        $data['admin_email'] = $this->input->post('email', true);
        $data['admin_password'] = $this->input->post('password', true);
        $data['admin_registration_date'] = $this->input->post('time', true);
        $data['admin_level'] = $this->input->post('level', true);
        $data['admin_status'] = $this->input->post('status', true);
        $admin_id=$this->input->post('admin_id',true);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_admin',$data);
    }
    
    public function delete_admin_by_id($admin_id)
    {
        $this->db->where('admin_id',$admin_id);
        $this->db->delete('tbl_admin');
    }
    
    public function save_price_info()
    {
        $data = array();
        $data['quality'] = $this->input->post('quality', true);
        $data['price'] = $this->input->post('price', true);
        $this->db->insert('tbl_price', $data);
    }

    public function select_all_price()
    {
        $sql = "SELECT * FROM tbl_price";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_price_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_price');
        $this->db->where('price_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_price_info() 
    {
        $data = array();
        $data['quality'] = $this->input->post('quality', true);
        $data['price'] = $this->input->post('price', true);
        $id = $this->input->post('id', true);
        $this->db->where('price_id', $id);
        $this->db->update('tbl_price', $data);
    }

    public function delete_price_by_id($id)
    {
        $this->db->where('price_id', $id);
        $this->db->delete('tbl_price');
    }
    
    public function save_debit_info() 
    {   
        $data = array();
        $data['cashbook_description'] = $this->input->post('debit_category_name', true);
        $data['transaction_time'] = $this->input->post('time', true);
        $data['cashbook_debit'] = $this->input->post('paid', true);
        $current_balance=$this->input->post('balance', true);
        $data['cashbook_balance'] = ($current_balance + $data['cashbook_debit']);
        $this->db->insert('tbl_cashbook', $data);
    }
    
    public function select_all_debit()
    {
        $sql = "SELECT * FROM tbl_cashbook WHERE cashbook_debit IS NOT NULL ORDER BY cashbook_id DESC";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function save_debit_category_info()
    {
        $data = array();
        $data['debit_category_name'] = $this->input->post('name', true);
        $this->db->insert('tbl_debit_category', $data);
    }

    public function select_all_debit_category()
    {
        $sql = "SELECT * FROM tbl_debit_category ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_debit_category_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_debit_category');
        $this->db->where('debit_category_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_debit_category_info() 
    {
        $data = array();
        $data['debit_category_name'] = $this->input->post('name', true);
        $id = $this->input->post('id', true);
        $this->db->where('debit_category_id', $id);
        $this->db->update('tbl_debit_category', $data);
    }

    public function delete_debit_category_by_id($id)
    {
        $this->db->where('debit_category_id', $id);
        $this->db->delete('tbl_debit_category');
    }

    public function save_credit_info() 
    {   
        $data = array();
        $data['cashbook_description'] = $this->input->post('credit_category_name', true);
        $data['transaction_time'] = $this->input->post('time', true);
        $data['cashbook_credit'] = $this->input->post('paid', true);
        $current_balance=$this->input->post('balance', true);
        $data['cashbook_balance'] = ($current_balance - $data['cashbook_credit']);
        $this->db->insert('tbl_cashbook', $data);
    }
    
    public function select_all_credit()
    {
        $sql = "SELECT * FROM tbl_cashbook WHERE cashbook_credit IS NOT NULL ORDER BY cashbook_id DESC";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function save_credit_category_info()
    {
        $data = array();
        $data['credit_category_name'] = $this->input->post('name', true);
        $this->db->insert('tbl_credit_category', $data);
    }

    public function select_all_credit_category()
    {
        $sql = "SELECT * FROM tbl_credit_category ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_credit_category_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_credit_category');
        $this->db->where('credit_category_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_credit_category_info() 
    {
        $data = array();
        $data['credit_category_name'] = $this->input->post('name', true);
        $id = $this->input->post('id', true);
        $this->db->where('credit_category_id', $id);
        $this->db->update('tbl_credit_category', $data);
    }

    public function delete_credit_category_by_id($id)
    {
        $this->db->where('credit_category_id', $id);
        $this->db->delete('tbl_credit_category');
    }
    
    public function select_all_cashbook()
    {
        $sql = "SELECT * FROM tbl_cashbook ORDER BY cashbook_id DESC";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function save_contractor_category_info()
    {
        $data = array();
        $data['contractor_category_name'] = $this->input->post('name', true);
        $this->db->insert('tbl_contractor_category', $data);
    }

    public function select_all_contractor_category()
    {
        $sql = "SELECT * FROM tbl_contractor_category ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_contractor_category_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_contractor_category');
        $this->db->where('contractor_category_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_contractor_category_info() 
    {
        $data = array();
        $data['contractor_category_name'] = $this->input->post('name', true);
        $id = $this->input->post('id', true);
        $this->db->where('contractor_category_id', $id);
        $this->db->update('tbl_contractor_category', $data);
    }

    public function delete_contractor_category_by_id($id)
    {
        $this->db->where('contractor_category_id', $id);
        $this->db->delete('tbl_contractor_category');
    }

    public function save_contractor_info()
    {
        $data = array();
        $data['contractor_category_id'] = $this->input->post('contractor_category_id', true);
        $data['contractor_name'] = $this->input->post('name', true);
        $data['contractor_address'] = $this->input->post('address', true);
        $data['contractor_mobile'] = $this->input->post('mobile', true);
        $data['number_of_labor'] = $this->input->post('quantity', true);
        $this->db->insert('tbl_contractor', $data);
    }

    public function select_all_contractor() 
    {
        $sql = "SELECT * FROM tbl_contractor AS c, tbl_contractor_category AS a WHERE c.contractor_category_id=a.contractor_category_id ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_contractor_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_contractor');
        $this->db->where('contractor_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_contractor_info()
    {
        $data = array();
        $data['contractor_category_id'] = $this->input->post('id', true);
        $data['contractor_name'] = $this->input->post('name', true);
        $data['contractor_address'] = $this->input->post('address', true);
        $data['contractor_mobile'] = $this->input->post('mobile', true);
        $data['number_of_labor'] = $this->input->post('quantity', true);
        $id = $this->input->post('id', true);
        $this->db->where('contractor_id', $id);
        $this->db->update('tbl_contractor', $data);
    }

    public function delete_contractor_by_id($id) 
    {
        $this->db->where('contractor_id', $id);
        $this->db->delete('tbl_contractor');
    }
    
    public function select_contractor_transaction_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_contractor_transaction');
        $this->db->where('contractor_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function save_contractor_transaction_info() 
    {
        $data = array();
        $data['contractor_id'] = $this->input->post('contractor_id', true);
        $data['net_amount'] = $this->input->post('net', true);
        $data['paid_amount'] = $this->input->post('paid', true);
        $data['total_due_amount'] = $this->input->post('due_amount', true);
        $data['previous_due'] = $this->input->post('due', true);
        $data['contractor_transaction_time'] = $this->input->post('time', true);
        $this->db->insert('tbl_contractor_transaction', $data);
        $contractor_transaction_id=$this->db->insert_id();
        $cashbook = array();
        $cashbook['cashbook_description'] = 'Contractor Transaction';
        $cashbook['transaction_time'] = $this->input->post('time', true);
        $cashbook['cashbook_credit'] = $this->input->post('paid', true);
        $current_balance=$this->input->post('balance', true);
        $cashbook['cashbook_balance'] = ($current_balance - $cashbook['cashbook_credit']);
        $cashbook['contractor_transaction_id'] = $contractor_transaction_id;
        $this->db->insert('tbl_cashbook', $cashbook);
        $contractor = array();
        $contractor['due_amount'] = $this->input->post('due_amount', true);
        $id = $this->input->post('contractor_id', true);
        $this->db->where('contractor_id', $id);
        $this->db->update('tbl_contractor', $contractor);
    }

    public function select_all_contractor_transaction()
    {
        $sql = "SELECT * FROM tbl_contractor_transaction AS t, tbl_contractor AS c, tbl_contractor_category AS s WHERE t.contractor_id = c.contractor_id AND s.contractor_category_id=c.contractor_category_id ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_customer() 
    {
        $sql = "SELECT * FROM tbl_customer";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_customer_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_customer_info()
    {
        $data = array();
        $data['customer_name'] = $this->input->post('name', true);
        $data['customer_address'] = $this->input->post('address', true);
        $data['customer_mobile'] = $this->input->post('mobile', true);
        $id = $this->input->post('id', true);
        $this->db->where('customer_id', $id);
        $this->db->update('tbl_customer', $data);
    }

    public function delete_customer_by_id($id) 
    {
        $this->db->where('customer_id', $id);
        $this->db->delete('tbl_customer');
    }
    
    public function select_customer_transaction_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer_transaction');
        $this->db->where('customer_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_customer_sale_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_sale');
        $this->db->where('customer_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function save_customer_transaction_info() 
    {
        $data = array();
        $data['customer_id'] = $this->input->post('customer_id', true);
        $data['net_amount'] = $this->input->post('net', true);
        $data['paid_amount'] = $this->input->post('paid', true);
        $data['total_due_amount'] = $this->input->post('due_amount', true);
        $data['previous_due'] = $this->input->post('due', true);
        $data['customer_transaction_time'] = $this->input->post('time', true);
        $this->db->insert('tbl_customer_transaction', $data);
        $customer_transaction_id=$this->db->insert_id();
        $cashbook = array();
        $cashbook['cashbook_description'] = 'Customer Transaction';
        $cashbook['transaction_time'] = $this->input->post('time', true);
        $cashbook['cashbook_debit'] = $this->input->post('paid', true);
        $current_balance=$this->input->post('balance', true);
        $cashbook['cashbook_balance'] = ($current_balance + $cashbook['cashbook_debit']);
        $cashbook['customer_transaction_id'] = $customer_transaction_id;
        $this->db->insert('tbl_cashbook', $cashbook);
        $customer = array();
        $customer['due_amount'] = $this->input->post('due_amount', true);
        $id = $this->input->post('customer_id', true);
        $this->db->where('customer_id', $id);
        $this->db->update('tbl_customer', $customer);
    }

    public function select_all_customer_transaction()
    {
        $sql = "SELECT * FROM tbl_customer_transaction AS t, tbl_customer AS c WHERE t.customer_id = c.customer_id ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_last_customer()
    {
        $sql = "SELECT * FROM tbl_customer ORDER BY customer_id DESC LIMIT 1";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_last_sale()
    {
        $sql = "SELECT * FROM tbl_sale ORDER BY sale_id DESC LIMIT 1 ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function search_ref_invoice($ref_number)
    {
        $sql = "SELECT * FROM tbl_sale WHERE ref_no='$ref_number' ORDER BY sale_id DESC LIMIT 1";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function save_old_sale_info() 
    {
        $new_customer = array();
        $new_customer['customer_name'] = $this->input->post('name', true);
        $new_customer['customer_address'] = $this->input->post('address', true);
        $new_customer['customer_mobile'] = $this->input->post('mobile', true);
        $new_customer['due_amount'] = $this->input->post('due_amount', true);
        $new_customer['due_bricks'] = $this->input->post('due_bricks', true);
        $new_customer['bricks_name'] = $this->input->post('bricks_name', true);
        $customer_id = $this->input->post('customer_id', true);
        $this->db->where('customer_id', $customer_id);
        $this->db->update('tbl_customer', $new_customer);
        $data = array();
        $data['ref_no'] = $this->input->post('ref_no', true);
        $data['customer_id'] = $this->input->post('customer_id', true);
        $data['customer_name'] = $this->input->post('name', true);
        $data['customer_address'] = $this->input->post('address', true);
        $data['customer_mobile'] = $this->input->post('mobile', true);
        $data['vehicle_no'] = $this->input->post('vehicle_no', true);
        $data['time'] = $this->input->post('time', true);
        $data['bricks_name'] = $this->input->post('bricks_name', true);
        $data['net_price'] = $this->input->post('total_price', true);
        $data['discount'] = $this->input->post('discount', true);
        $data['note'] = $this->input->post('note', true);
        $data['due_bricks'] = $this->input->post('due_bricks', true);
        $data['quantity'] = $this->input->post('quantity', true);
        $data['paid'] = $this->input->post('paid_amount', true);
        $data['due'] = $this->input->post('due_amount', true);
        $this->db->insert('tbl_sale', $data);
        $sale_id=$this->db->insert_id();
        $cashbook = array();
        $cashbook['cashbook_description'] = 'Sale';
        $cashbook['transaction_time'] = $this->input->post('time', true);
        $cashbook['cashbook_debit'] = $this->input->post('total_price', true);
        $cashbook['cashbook_debit_receivable'] = $this->input->post('due_amount', true);
        $current_balance=$this->input->post('balance', true);
        $cashbook['cashbook_balance'] = ($current_balance + $cashbook['cashbook_debit']);
        $cashbook['sale_id'] = $sale_id;
        $this->db->insert('tbl_cashbook', $cashbook);
    }
    
    public function save_sale_info() 
    {
        $new_customer = array();
        $new_customer['customer_name'] = $this->input->post('name', true);
        $new_customer['customer_address'] = $this->input->post('address', true);
        $new_customer['customer_mobile'] = $this->input->post('mobile', true);
        $new_customer['due_amount'] = $this->input->post('due_amount', true);
        $new_customer['due_bricks'] = $this->input->post('due_bricks', true);
        $new_customer['bricks_name'] = $this->input->post('bricks_name', true);
        $this->db->insert('tbl_customer', $new_customer);
        $customer_id=$this->db->insert_id();
        $data = array();
        $data['ref_no'] = $this->input->post('ref_no', true);
        $data['customer_id'] = $customer_id;
        $data['customer_name'] = $this->input->post('name', true);
        $data['customer_address'] = $this->input->post('address', true);
        $data['customer_mobile'] = $this->input->post('mobile', true);
        $data['vehicle_no'] = $this->input->post('vehicle_no', true);
        $data['time'] = $this->input->post('time', true);
        $data['bricks_name'] = $this->input->post('bricks_name', true);
        $data['net_price'] = $this->input->post('total_price', true);
        $data['discount'] = $this->input->post('discount', true);
        $data['note'] = $this->input->post('note', true);
        $data['due_bricks'] = $this->input->post('due_bricks', true);
        $data['quantity'] = $this->input->post('quantity', true);
        $data['paid'] = $this->input->post('paid_amount', true);
        $data['due'] = $this->input->post('due_amount', true);
        $this->db->insert('tbl_sale', $data);
        $sale_id=$this->db->insert_id();
        $cashbook = array();
        $cashbook['cashbook_description'] = 'Sale';
        $cashbook['transaction_time'] = $this->input->post('time', true);
        $cashbook['cashbook_debit'] = $this->input->post('total_price', true);
        $cashbook['cashbook_debit_receivable'] = $this->input->post('due_amount', true);
        $current_balance=$this->input->post('balance', true);
        $cashbook['cashbook_balance'] = ($current_balance + $cashbook['cashbook_debit']);
        $cashbook['sale_id'] = $sale_id;
        $this->db->insert('tbl_cashbook', $cashbook);
    }
    
    public function select_all_sale()
    {
        $sql = "SELECT * FROM tbl_sale ORDER BY sale_id DESC";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
 
    public function select_sale_detail($sale_id)
    {
        $sql = "SELECT * FROM tbl_sale AS s WHERE s.sale_id='$sale_id' ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function save_employee_info()
    {
        $data = array();
        $data['employee_type'] = $this->input->post('employee_type', true);
        $data['employee_name'] = $this->input->post('name', true);
        $data['employee_address'] = $this->input->post('address', true);
        $data['employee_mobile'] = $this->input->post('mobile', true);
        $data['employee_nid'] = $this->input->post('nid', true);
        $data['employee_salary'] = $this->input->post('salary', true);
        $this->db->insert('tbl_employee', $data);
    }

    public function select_all_employee() 
    {
        $sql = "SELECT * FROM tbl_employee";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_employee_transaction_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_salary');
        $this->db->where('employee_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_employee_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('employee_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_employee_info()
    {
        $data = array();
        $data['employee_type'] = $this->input->post('employee_type', true);
        $data['employee_name'] = $this->input->post('name', true);
        $data['employee_address'] = $this->input->post('address', true);
        $data['employee_mobile'] = $this->input->post('mobile', true);
        $data['employee_nid'] = $this->input->post('nid', true);
        $data['employee_salary'] = $this->input->post('salary', true);
        $id = $this->input->post('id', true);
        $this->db->where('employee_id', $id);
        $this->db->update('tbl_employee', $data);
    }

    public function delete_employee_by_id($id) 
    {
        $this->db->where('employee_id', $id);
        $this->db->delete('tbl_employee');
    }

    public function save_salary_info() 
    {
        $data = array();
        $data['employee_id'] = $this->input->post('employee_id', true);
        $data['net_amount'] = $this->input->post('net', true);
        $data['paid_amount'] = $this->input->post('paid', true);
        $data['total_due_amount'] = $this->input->post('due_amount', true);
        $data['previous_due'] = $this->input->post('due', true);
        $data['salary_time'] = $this->input->post('time', true);
        $this->db->insert('tbl_salary', $data);
        $salary_id=$this->db->insert_id();
        $cashbook = array();
        $cashbook['cashbook_description'] = 'Employee Transaction';
        $cashbook['transaction_time'] = $this->input->post('time', true);
        $cashbook['cashbook_credit'] = $this->input->post('paid', true);
        $current_balance=$this->input->post('balance', true);
        $cashbook['cashbook_balance'] = ($current_balance - $cashbook['cashbook_credit']);
        $cashbook['salary_id'] = $salary_id;
        $this->db->insert('tbl_cashbook', $cashbook);
        $employee = array();
        $employee['due_amount'] = $this->input->post('due_amount', true);
        $id = $this->input->post('employee_id', true);
        $this->db->where('employee_id', $id);
        $this->db->update('tbl_employee', $employee);
    }

    public function select_all_salary()
    {
        $sql = "SELECT * FROM tbl_salary AS s, tbl_employee AS e WHERE s.employee_id = e.employee_id ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_credit_report_info($from,$to)
    {
        $sql = "SELECT * FROM tbl_cashbook WHERE cashbook_credit IS NOT NULL AND transaction_time BETWEEN '$from' AND '$to'";
        $result = $this->db->query($sql)->result();
        return $result;   
    }
    
    public function select_total_credit($from,$to)
    {
        $sql = "SELECT SUM(cashbook_credit) AS total FROM tbl_cashbook WHERE cashbook_credit IS NOT NULL AND (transaction_time BETWEEN '$from' AND '$to')";
        $result = $this->db->query($sql)->row();
        return $result;   
    }
    
    public function select_debit_report_info($from,$to)
    {
        $sql = "SELECT * FROM tbl_cashbook WHERE cashbook_debit IS NOT NULL AND transaction_time BETWEEN '$from' AND '$to'";
        $result = $this->db->query($sql)->result();
        return $result;   
    }
    
    public function select_total_debit($from,$to)
    {
        $sql = "SELECT SUM(cashbook_debit) AS total FROM tbl_cashbook WHERE cashbook_debit IS NOT NULL AND (transaction_time BETWEEN '$from' AND '$to')";
        $result = $this->db->query($sql)->row();
        return $result;   
    }
    
    public function select_cashbook_report($from,$to)
    {
        $sql = "SELECT * FROM tbl_cashbook WHERE transaction_time BETWEEN '$from' AND '$to'";
        $result = $this->db->query($sql)->result();
        return $result;   
    }
}