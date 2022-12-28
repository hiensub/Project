using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.ComponentModel.DataAnnotations.Schema;
using System.ComponentModel.DataAnnotations;


namespace MyClass.Models
{
    [Table("Users")]
    public class User
    {
        [Key]
        public int Id { get; set; }
        [Required(ErrorMessage = "không được để trống")]
        public string UseName { get; set; }
        [Required(ErrorMessage = "không được để trống")]
        public string PassWord { get; set; }
        
        public string FullName { get; set; }
        [RegularExpression(@"^(\d{10})$", ErrorMessage = "Hãy điền số điện thoại 10 số")]
        public string Phone { get; set; }
        [RegularExpression(@"^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$", ErrorMessage = "Hãy nhập đúng định dạng : abc@gmail.com")]
        public string Email { get; set; }
        public string Address { get; set; }
        [Required(ErrorMessage = "không được để trống")]
        public string Roles { get; set; }
        public int? CreateBy { get; set; }
        public DateTime? CreateAt { get; set; }
        public int? UpdateBy { get; set; }
        public DateTime? UpdateAt { get; set; }
        public int Status { get; set; }
    }
}
