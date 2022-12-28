using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.ComponentModel.DataAnnotations.Schema;
using System.ComponentModel.DataAnnotations;


namespace MyClass.Models
{
    [Table ("Contacts")]
    public class Contact
    {
        [Key]
        public int Id { get; set; }
        
        [Required(ErrorMessage = "Tiêu đề không thể để trống")]
        [StringLength(200)]
        public string FullName { get; set; }
        [Required]
        public string Email { get; set; }
        [Required]
        public string Phone { get; set; }
        
        public string Tilte { get; set; }
        public string Content { get; set; }
        public int? CreateBy { get; set; }
        public DateTime? CreateAt { get; set; }
        public int? UpdateBy { get; set; }
        public DateTime? UpdateAt { get; set; }
        public int Status { get; set; }


    }
}
