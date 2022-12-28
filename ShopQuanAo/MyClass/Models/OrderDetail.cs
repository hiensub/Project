using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.ComponentModel.DataAnnotations.Schema;
using System.ComponentModel.DataAnnotations;


namespace MyClass.Models
{
    [Table("OrderDetails")]
    public class OrderDetail
    {
        [Key]
        public int Id { get; set; }
        [Required]
        public int OrderId { get; set; }
       
        public int ProductId { get; set; }  
        public decimal Price { get; set; }    
        public int Qty { get; set; }
        public decimal Amount { get; set; }
        public string Sale { get; set; }
        
    }
}
