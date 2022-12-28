using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using System.Web.Routing;

namespace ShopQuanAo
{
    public class RouteConfig
    {
        public static void RegisterRoutes(RouteCollection routes)
        {
            //khai báo url
            routes.IgnoreRoute("{resource}.axd/{*pathInfo}");

            routes.MapRoute(
                name: "TatCaSanPham",
                url: "tat-ca-san-pham",
                defaults: new { controller = "Home", action = "Product", id = UrlParameter.Optional }
            );
            routes.MapRoute(
                name: "TatCaBaiViet",
                url: "tat-ca-bai-viet",
                defaults: new { controller = "Home", action = "Post", id = UrlParameter.Optional }
            );
            routes.MapRoute(
                name: "LienHe",
                url: "lien-he",
                defaults: new { controller = "LienHe", action = "Index", id = UrlParameter.Optional }
            );
            routes.MapRoute(
                name: "GioHang",
                url: "gio-hang",
                defaults: new { controller = "GioHang", action = "Index", id = UrlParameter.Optional }
            );
            routes.MapRoute(
                name: "ThanhToan",
                url: "thanh-toan",
                defaults: new { controller = "GioHang", action = "ThanhToan", id = UrlParameter.Optional }
            );

           // routes.MapRoute(
           //    name: "DangKi",
           //    url: "dang-ki",
           //    defaults: new { controller = "KhachHang", action = "DangKi", id = UrlParameter.Optional }
           //);
            routes.MapRoute(
               name: "DangNhap",
               url: "dang-nhap",
               defaults: new { controller = "KhachHang", action = "DangNhap", id = UrlParameter.Optional }
           );


            routes.MapRoute(
                name: "Timkiem",
                url: "tim-kiem",
                defaults: new { controller = "TimKiem", action = "Index", id = UrlParameter.Optional }
            );
            routes.MapRoute(
               name: "ThanhCong",
               url: "thanh-cong",
               defaults: new { controller = "GioHang", action = "ThanhCong", id = UrlParameter.Optional }
           );

            //khai bao url động
            routes.MapRoute(
                name: "SiteSlug",
                url: "{slug}",
                defaults: new { controller = "Home", action = "Index", id = UrlParameter.Optional }
            );
            routes.MapRoute(
                name: "Default",
                url: "{controller}/{action}/{id}",
                defaults: new { controller = "Home", action = "Index", id = UrlParameter.Optional }
            );
        }
    }
}
