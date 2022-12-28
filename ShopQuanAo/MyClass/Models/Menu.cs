using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.ComponentModel.DataAnnotations.Schema;
using System.ComponentModel.DataAnnotations;

namespace MyClass.Models
{
    [Table ("Menus")]
    public class Menu
    {
        [Key]
        public int Id { get; set; }
        [Required(ErrorMessage ="Tên menu không được để trống")]
        public string Name { get; set; }
        [Required(ErrorMessage = "Liên kết không được để trống")]
        public string Link { get; set; }
        public int TableId { get; set; }//moi
        public string TypeMenu { get; set; }//moi
        public string Position { get; set; }//moi
        public int? ParentId { get; set; }
        public int? Orders { get; set; }
        public int? CreateBy { get; set; }
        public DateTime? CreateAt { get; set; }
        public int? UpdateBy { get; set; }
        public DateTime? UpdateAt { get; set; }
        public int Status { get; set; }
    }
}
