<?php
require_once __DIR__ . '/autoload.php';
$controller = new \App\Models\User();
$action = $_GET['action'] ?: 'Index';
include __DIR__ . '/App/templates/index_top.php';
try {
    $controller->action($action);
} catch(\App\Exceptions\Core $e){
    echo '�������� ���������� ' . $e->getMessage();
}catch (\App\Exceptions\Db $e) {
    echo '�������� � ����� ������: ' . $e->getMessage();
}
include  __DIR__ . '/App/templates/index_bottom.php';

/*if (isset($_POST['submit'])) // ����������� ������� ������ "���������"
{
    if (empty($_POST['login'])) // ���� ���� ����� ������
    {
        echo '<script>alert("���� ����� �� ����������");</script>'; // �� ������� ��������� �� ������
    }
    elseif (empty($_POST['password'])) // ���� ���� ������ ������
    {
        echo '<script>alert("���� ������ �� ����������");</script>'; // �� ������� ��������� �� ������
    }
    else  // ����� ���� ��� ���� ����������


        if (empty($result['id'])) // ���� ������ � �� �� ���������� id ������������
        {
            echo '<script>alert("�������� ����� ��� ������");</script>'; // ������ ����� ������������ �� ���������� ��� �� ����� ������
        }
        else // ���� ���������� id ������������, ��������� ���� ��� ���
        {
            $_SESSION['password'] = $password; // ������� � ������  ������
            $_SESSION['login'] = $login; // ������� � ������  �����
            $_SESSION['id'] = $result['id']; // ������� � ������  id
            echo '<div align="center">�� ������� ����� � �������: '.$_SESSION['login'].'</div>'; // ������� ��������� ��� ������������ �������������
        }
    }
}*/