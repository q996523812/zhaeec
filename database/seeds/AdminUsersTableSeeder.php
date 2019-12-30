<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Encore\Admin\Auth\Database\Administrator as Admin_User;

class AdminUsersTableSeeder extends Seeder
{
    public function run()
    {
        $rows = [
            $this->create(2,'heqianqian','$2y$10$59y0W2B819pvQnnHCypUIeWCRdaQuiF38xxLkBJ0HeMC5fEYa0Ifa','贺芊芊','4C013UFIX7sBcaVPHIXjplGIOBuG4Uyprs1W1TJccA7D7pQ9ZZ742IqMnohB'),
            $this->create(3,'chenjun','$2y$10$VIOBTy5z4lVcHsU/7O7b1OtPMuWK000x0lSOdPztqLcMebnjr.G.O','陈俊','L1aNyjFE0MDmALyZP6v5cFq8NQfeOBqHj799IIfYPsI9NczgJG7gAl7wkECh'),
            $this->create(4,'jiangyuni','$2y$10$P2xh7RReeoXezmKVHBtKc.F.c3nM62HY9Tc5sXjwlxg0e2ILFp2tm','江玉尼',null),
            $this->create(5,'dengyanping','$2y$10$O74aGb1MFvpfOZAe4oWHbekHH9l2aaQIAzfiqk/etc99Bc7GEK./.','邓艳平',null),
            $this->create(6,'cenyinlan','$2y$10$vzVDjQXOcNpXKpiO7mubUO7xD6mjYhf0XlqBoAaVU/20EpD/sMOmy','岑茵蓝',null),
            $this->create(7,'zhaoyafei','$2y$10$2cl6Ta.KjUF9vWO39ddVHeT9EMZRt/th4PTYXsyNxmWZCYcuVNCCC','赵涯菲',null),
            $this->create(8,'qinshanshan','$2y$10$y.EhVMwnZ4.89rrnRw1qcuqrNCs1KG1Sscq9YsbwtQYqOhjkmfcqC','覃山山',null),
            $this->create(9,'xiayi','$2y$10$kh8eOU1BBquek209.X5SlOF9uug91A1H9RuOvK2XpGTsfCN45gHEu','夏毅',null),
            $this->create(10,'xiadexing','$2y$10$FlSJ3mE8lctMfQpB8gQ5uezeaw5/h2tFK81Clo3NRMRpgDXuJm.i2','夏德兴',null),
            $this->create(11,'lijiangyu','$2y$10$xa96ZgPYVRP4knCZxjNOj.H/V5jtPvdrlKSruQ9JOtX6ltvdyu9xW','李江宇',null),
            $this->create(12,'liuyilin','$2y$10$FCrYuNwVUXJaBXh43hK7redhRHoaoHSCW3Vwpifl30zgnQyaiXSoW','刘一霖',null),
            $this->create(13,'taomengxian','$2y$10$SbnpYkMMVFnFDUUV6hM/WeeFQ8XRiN1f1xMTr.pGJHd/lpm.J/MBG','陶梦娴',null),
            $this->create(14,'tangsina','$2y$10$86/20xuD/yF7W8/Ti4yOZuV2AOSDgj8R9lwMXivMvfLxxB9J2wMo6','汤思娜',null),
            $this->create(15,'zhangli','$2y$10$IDnWS3o3coOiVcp/cXhxqe6j.fD0ArA2BXwTw.Tdlmp7OrJFYRU12','张丽',null),
            $this->create(16,'liulina','$2y$10$rjcipOVn8rvdSjjEkwcNiOXysaj8Y/dW9z.U6wH3Rs9D66b9AUon6','刘丽娜',null),
            $this->create(17,'pengxiulan','$2y$10$xl0MaL.8woVjOC7jZYhrr.Td34/y3h7Nd7FuAUOy3JF07/YfUkaBi','彭秀兰',null),
            $this->create(18,'caidanjue','$2y$10$xXVt9bqinehSBHQmWplDkeSFjYXwHrsEpgGVFdVIR0UxhrMthKSdC','蔡丹珏',null),
            $this->create(19,'zhangwenjun','$2y$10$2aq1fJ0WTBxhfa7xWQLOOel034dk95vePEYOaYaNTMSubb3zj0WNG','张文君',null),
            $this->create(20,'luoruobing','$2y$10$6MwHZqzxX02s9UQ0HBaeu.QInGw959EPlkqD1Q75edlfiukaZvrfS','罗若冰',null),
            $this->create(21,'huangdanni','$2y$10$9WLCtQQzqMzi70eZcsAZ7OehtLN1dZESQJIf4lzcBXBZvFC2BAO2K','黄丹妮',null),
            $this->create(22,'tangxinyu','$2y$10$T6QRznncMh/rEGb2ThM8buKBBV5u7oO8wJhDOn6VhuPMYHvKpLViG','唐鑫宇',null),
            
        ];

        // 将数据集合插入到数据库中
        Admin_User::insert($rows);
    }

    private function create($id,$username,$password,$name,$remember_token){
        $row = [
            'id' => $id,
            'username' => $username,
            'password' => $password,
            'name' => $name,
            'remember_token' => $remember_token,
            'created_at' => now(),
        ];
        return $row;
    }    
}