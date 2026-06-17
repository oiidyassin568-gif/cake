<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cakes Oasis - متجر الحلويات</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=Fredoka:wght@600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #733251;
            --secondary-color: #8A4F6E;
            --bg-soft-pink: #FFF0F2;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background-color: var(--bg-soft-pink);
            scroll-behavior: smooth;
        }

        .brand-font {
            font-family: 'Fredoka', sans-serif;
        }

        .wave-bg {
            background: linear-gradient(180deg, #FFF0F2 0%, #ffffff 100%);
        }

        .gallery-item {
            transition: all 0.4s ease-in-out;
        }

        .gallery-item.hidden {
            display: none;
            opacity: 0;
            transform: scale(0.8);
        }

        @keyframes pulse-green {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7);
            }

            70% {
                transform: scale(1.05);
                box-shadow: 0 0 0 15px rgba(34, 197, 94, 0);
            }

            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(34, 197, 94, 0);
            }
        }

        .whatsapp-pulse {
            animation: pulse-green 2s infinite;
        }
    </style>
</head>

<body class="text-gray-800 overflow-x-hidden relative">

    <a href="https://wa.me/+2012 80733952?text=%D9%85%D8%B1%D8%AD%D8%A8%D8%A7%D9%8B%20%D9%83%D9%8A%D9%83%20%D8%A3%D9%84%D9%88%D8%A7%D8%B3%D9%8A%D8%B3%D8%8C%20%D9%84%D8%AF%D9%8A%20%D8%A7%D8%B3%D8%AA%D9%81%D8%B3%D8%A7%D8%B1%20%D8%B9%D8%A7%D9%85."
        id="general-whatsapp-btn" target="_blank" rel="noopener noreferrer"
        class="whatsapp-pulse fixed bottom-6 right-6 z-40 bg-green-500 text-white w-14 h-14 rounded-full flex items-center justify-center text-3xl shadow-2xl hover:bg-green-600 transition duration-300">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <button onclick="toggleCartMenu()"
        class="fixed bottom-24 right-6 z-40 bg-[#733251] text-white w-14 h-14 rounded-full flex items-center justify-center text-xl shadow-2xl hover:bg-[#8A4F6E] transition duration-300 relative">
        <i class="fa-solid fa-basket-shopping"></i>
        <span id="cart-badge"
            class="absolute -top-1 -left-1 bg-red-500 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center hidden">0</span>
    </button>

    <div id="cart-sidebar"
        class="fixed top-0 right-0 h-full w-full sm:w-96 bg-white z-50 shadow-2xl transform translate-x-full transition-transform duration-300 flex flex-col">
        <div class="p-4 border-b border-gray-100 flex justify-between items-center bg-[#FFF0F2]">
            <button onclick="toggleCartMenu()" class="text-gray-500 hover:text-gray-800 text-xl"><i
                    class="fa-solid fa-xmark"></i></button>
            <h3 class="font-bold text-[#733251] text-lg">سلة التسوق الخاص بك</h3>
        </div>
        <div id="cart-items-container" class="p-4 overflow-y-auto flex-1 space-y-4 text-right">
            <p id="empty-cart-text" class="text-gray-400 text-center py-8">السلة فارغة حالياً.. املأها بالحلويات
                المبهجة! 🍰</p>
        </div>
        <div class="p-4 border-t border-gray-100 bg-[#FFF0F2] space-y-4 text-right">
            <div class="space-y-3">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">عنوان التوصيل بالتفصيل</label>
                    <textarea id="cart-delivery-address" rows="2"
                        class="w-full rounded-2xl border border-pink-200 px-4 py-3 focus:outline-none focus:border-[#733251] text-right"
                        placeholder="مثال: شارع التحرير، عمارة 12، شقة 5"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">تاريخ ووقت الاستلام المرغوب</label>
                    <input type="text" id="cart-preferred-datetime"
                        class="w-full rounded-2xl border border-pink-200 px-4 py-3 focus:outline-none focus:border-[#733251] text-right"
                        placeholder="مثال: غداً الساعة 6 مساءً">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">ملاحظات خاصة للخبّاز</label>
                    <textarea id="cart-baker-notes" rows="2"
                        class="w-full rounded-2xl border border-pink-200 px-4 py-3 focus:outline-none focus:border-[#733251] text-right"
                        placeholder="مثال: تقليل السكر، أو تزيين أزرق وأبيض"></textarea>
                </div>
            </div>
        </div>
        <div class="p-4 border-t border-gray-100 bg-gray-50 space-y-3">
            <div class="flex justify-between items-center flex-row-reverse">
                <span class="font-bold text-[#733251] text-xl" id="cart-total-price">$0.00</span>
                <span class="text-gray-600 font-semibold">إجمالي الطلب:</span>
            </div>
            <button onclick="checkoutToWhatsApp()"
                class="w-full bg-green-500 text-white py-3 rounded-xl font-bold hover:bg-green-600 transition flex items-center justify-center gap-2 shadow-md">
                <i class="fa-brands fa-whatsapp text-lg"></i> إتمام الطلب عبر واتساب
            </button>
        </div>
    </div>

    <nav class="sticky top-0 z-30 bg-[#FFF0F2]/90 backdrop-blur-md shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center flex-row-reverse">
            <div class="text-2xl font-bold brand-font text-[#733251] cursor-pointer">Cakes Oasis</div>

            <div class="hidden md:flex space-x-8 space-x-reverse font-semibold text-sm text-gray-700">
                <a href="#home" class="hover:text-[#733251] transition">الرئيسية</a>
                <a href="#products" class="hover:text-[#733251] transition">منتجاتنا</a>
                <a href="#gallery" class="hover:text-[#733251] transition">معرض أعمالنا</a>
                <a href="#story" class="hover:text-[#733251] transition">قصتنا</a>
                <a href="#contact" class="hover:text-[#733251] transition">تواصل معنا</a>
            </div>

            <div class="hidden md:block">
                <button onclick="document.getElementById('products').scrollIntoView();"
                    class="bg-[#733251] text-white px-6 py-2 rounded-full text-sm font-semibold hover:bg-[#8A4F6E] transition shadow-md">
                    اطلب الآن
                </button>
            </div>

            <button id="menu-btn" class="md:hidden text-[#733251] focus:outline-none">
                <i class="fa-solid fa-bars text-2xl"></i>
            </button>
        </div>

        <div id="mobile-menu"
            class="hidden md:hidden bg-white px-6 py-4 space-y-3 shadow-lg border-t border-gray-100 flex flex-col text-right">
            <a href="#home" class="block font-semibold text-gray-700 hover:text-[#733251]">الرئيسية</a>
            <a href="#products" class="block font-semibold text-gray-700 hover:text-[#733251]">منتجاتنا</a>
            <a href="#gallery" class="block font-semibold text-gray-700 hover:text-[#733251]">معرض أعمالنا</a>
            <a href="#story" class="block font-semibold text-gray-700 hover:text-[#733251]">قصتنا</a>
            <a href="#contact" class="block font-semibold text-gray-700 hover:text-[#733251]">تواصل معنا</a>
        </div>
    </nav>

    <section id="home"
        class="max-w-7xl mx-auto px-6 py-12 md:py-24 flex flex-col md:flex-row-reverse items-center justify-between gap-12">
        <div class="w-full md:w-1/2 flex justify-center relative">
            <div class="absolute w-72 h-72 md:w-96 md:h-96 bg-white/50 rounded-full blur-3xl -z-10 top-10"></div>
            <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=600&auto=format&fit=crop&q=80"
                alt="Cakes Oasis Main Cake"
                class="object-contain max-w-full h-auto rounded-2xl shadow-2xl border-4 border-white transform hover:scale-105 transition duration-500">
        </div>

        <div class="w-full md:w-1/2 space-y-6 text-center md:text-right">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#733251] leading-tight brand-font">
                حلاوة لا تُنسى<br>ستظل تشتاق إليها دائماً.
            </h1>
            <p class="text-gray-600 text-base md:text-lg max-w-xl mx-auto md:mx-0">
                هناك حكاية وراء كل قطعة حلوى نصنعها، نختار مكوناتنا بعناية فائقة لتنعم بتجربة تذوب في الفم وتأخذك إلى
                عالم مليء بالسعادة.
            </p>
            <div class="flex flex-col sm:flex-row justify-center md:justify-start gap-4 pt-4">
                <button onclick="document.getElementById('products').scrollIntoView();"
                    class="bg-[#733251] text-white px-8 py-3 rounded-full font-semibold hover:bg-[#8A4F6E] transition shadow-lg text-center">
                    اكتشف المنيو
                </button>
                <button onclick="document.getElementById('contact').scrollIntoView();"
                    class="border-2 border-[#733251] text-[#733251] px-8 py-3 rounded-full font-semibold hover:bg-[#733251] hover:text-white transition text-center">
                    تواصل معنا
                </button>
            </div>
        </div>
    </section>

    <section class="bg-white py-10 shadow-sm border-y border-pink-100">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div class="flex flex-col items-center p-4">
                <div
                    class="w-16 h-16 bg-[#FFF0F2] rounded-full flex items-center justify-center text-[#733251] text-2xl mb-4">
                    <i class="fa-solid fa-cake-candles"></i>
                </div>
                <h3 class="text-lg font-bold text-[#733251]">طازج يومياً</h3>
                <p class="text-sm text-gray-500 mt-1">يُخبز بحب فور طلبك لضمان أعلى جودة.</p>
            </div>
            <div class="flex flex-col items-center p-4">
                <div
                    class="w-16 h-16 bg-[#FFF0F2] rounded-full flex items-center justify-center text-[#733251] text-2xl mb-4">
                    <i class="fa-solid fa-truck-fast"></i>
                </div>
                <h3 class="text-lg font-bold text-[#733251]">توصيل مجاني</h3>
                <p class="text-sm text-gray-500 mt-1">توصيل سريع وآمن مبرد حتى باب منزلك.</p>
            </div>
            <div class="flex flex-col items-center p-4">
                <div
                    class="w-16 h-16 bg-[#FFF0F2] rounded-full flex items-center justify-center text-[#733251] text-2xl mb-4">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                </div>
                <h3 class="text-lg font-bold text-[#733251]">تصميم حسب الطلب</h3>
                <p class="text-sm text-gray-500 mt-1">نصنع لك كعكتك بالشكل والألوان التي تختارها.</p>
            </div>
        </div>
    </section>

    <section id="products" class="max-w-7xl mx-auto px-6 py-16">
        <div class="text-center space-y-3 mb-12">
            <h2 class="text-3xl font-bold text-[#733251] brand-font">تصفح إبداعاتنا المميزة</h2>
            <p class="text-gray-500 text-sm max-w-md mx-auto">اختر ما يبهج قلبك وضعه في سلة السعادة الخاصة بك</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
                class="bg-white rounded-2xl p-6 shadow-md border border-pink-50 hover:shadow-xl transition duration-300 flex flex-col justify-between text-right relative">
                <span class="absolute top-4 left-4 bg-[#733251] text-white text-xs px-3 py-1 rounded-full font-bold">20%
                    خصم</span>
                <img src="./images/i10.png"
                    alt="Cake" class="w-full h-48 object-cover rounded-xl mb-4">
                <div>
                    <h3 class="font-bold text-lg text-gray-800 product-name">كعكة الكريمة واللافندر</h3>
                    <div class="flex justify-between items-center mt-2 flex-row-reverse">
                        <span class="text-sm text-yellow-500 font-semibold"><i class="fa-solid fa-star"></i> 4.9</span>
                        <span class="text-[#733251] font-bold text-lg"><span class="product-price">900ج.م</span></span>
                    </div>
                </div>
                <button onclick="addToCart('كعكة الكريمة واللافندر', 900.00)"
                    class="mt-4 w-full bg-[#FFF0F2] text-[#733251] py-2 rounded-xl font-semibold hover:bg-[#733251] hover:text-white transition">أضف
                    للسلة</button>
            </div>

            <div
                class="bg-white rounded-2xl p-6 shadow-md border border-pink-50 hover:shadow-xl transition duration-300 flex flex-col justify-between text-right relative">
                <img src="./images/i6.png"
                    alt="Cake" class="w-full h-48 object-cover rounded-xl mb-4">
                <div>
                    <h3 class="font-bold text-lg text-gray-800 product-name">الشوكولاتة الداكنة</h3>
                    <div class="flex justify-between items-center mt-2 flex-row-reverse">
                        <span class="text-sm text-yellow-500 font-semibold"><i class="fa-solid fa-star"></i> 4.8</span>
                        <span class="text-[#733251] font-bold text-lg"><span class="product-price">500ج.م</span></span>
                    </div>
                </div>
                <button onclick="addToCart('الشوكولاتة الداكنة', 500.00)"
                    class="mt-4 w-full bg-[#FFF0F2] text-[#733251] py-2 rounded-xl font-semibold hover:bg-[#733251] hover:text-white transition">أضف
                    للسلة</button>
            </div>

            <div
                class="bg-white rounded-2xl p-6 shadow-md border border-pink-50 hover:shadow-xl transition duration-300 flex flex-col justify-between text-right relative">
                <span class="absolute top-4 left-4 bg-[#733251] text-white text-xs px-3 py-1 rounded-full font-bold">15%
                    خصم</span>
                <img src="./images/i5.png"
                    alt="Cake" class="w-full h-48 object-cover rounded-xl mb-4">
                <div>
                    <h3 class="font-bold text-lg text-gray-800 product-name">تورتة الفراولة الكلاسيكية</h3>
                    <div class="flex justify-between items-center mt-2 flex-row-reverse">
                        <span class="text-sm text-yellow-500 font-semibold"><i class="fa-solid fa-star"></i> 5.0</span>
                        <span class="text-[#733251] font-bold text-lg"><span class="product-price">1000ج.م</span></span>
                    </div>
                </div>
                <button onclick="addToCart('تورتة الفراولة الكلاسيكية', 34.00)"
                    class="mt-4 w-full bg-[#FFF0F2] text-[#733251] py-2 rounded-xl font-semibold hover:bg-[#733251] hover:text-white transition">أضف
                    للسلة</button>
            </div>
        </div>
    </section>

    <!-- <section id="custom-builder" class="bg-[#FFF0F2] py-16 border-t border-pink-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center space-y-3 mb-10">
                <h2 class="text-3xl font-bold text-[#733251] brand-font">🎂 صمّم كعكتك بنفسك</h2>
                <p class="text-gray-500 text-sm max-w-md mx-auto">اختَر تفاصيل كعكتك خطوة بخطوة ثم أضفها مباشرةً إلى سلة التسوق.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-right">
                <div class="space-y-6">
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-pink-100">
                        <h3 class="font-bold text-[#733251] mb-4">1. عدد الطوابق</h3>
                        <div class="flex flex-col gap-3">
                            <label class="flex items-center gap-3 p-3 rounded-2xl border border-gray-200 hover:border-[#733251] cursor-pointer">
                                <input type="radio" name="cake-tiers" value="طابق واحد" checked class="accent-[#733251]">
                                <span>طابق واحد</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-2xl border border-gray-200 hover:border-[#733251] cursor-pointer">
                                <input type="radio" name="cake-tiers" value="طابقين" class="accent-[#733251]">
                                <span>طابقين</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-2xl border border-gray-200 hover:border-[#733251] cursor-pointer">
                                <input type="radio" name="cake-tiers" value="3 طوابق" class="accent-[#733251]">
                                <span>3 طوابق</span>
                            </label>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-pink-100">
                        <h3 class="font-bold text-[#733251] mb-4">2. النكهة الأساسية</h3>
                        <select id="cake-flavor" class="w-full rounded-2xl border border-pink-200 px-4 py-3 text-right focus:outline-none focus:border-[#733251]">
                            <option value="فانيليا">فانيليا</option>
                            <option value="شوكولاتة">شوكولاتة</option>
                            <option value="ريد فيلفيت">ريد فيلفيت</option>
                            <option value="كراميل">كراميل</option>
                        </select>
                    </div>

                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-pink-100">
                        <h3 class="font-bold text-[#733251] mb-4">3. الحشو الداخلي</h3>
                        <select id="cake-filling" class="w-full rounded-2xl border border-pink-200 px-4 py-3 text-right focus:outline-none focus:border-[#733251]">
                            <option value="فراولة">فراولة</option>
                            <option value="نوتيلا">نوتيلا</option>
                            <option value="مكسرات">مكسرات</option>
                            <option value="كريمة زبدة">كريمة زبدة</option>
                        </select>
                    </div>

                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-pink-100">
                        <h3 class="font-bold text-[#733251] mb-4">4. نص مخصص على الكعكة</h3>
                        <input id="cake-message" type="text" maxlength="40"
                            class="w-full rounded-2xl border border-pink-200 px-4 py-3 text-right focus:outline-none focus:border-[#733251]"
                            placeholder="مثال: عيد ميلاد سعيد أحمد">
                    </div>

                    <button onclick="addCustomCakeToCart()"
                        class="w-full bg-[#733251] text-white py-4 rounded-full font-bold hover:bg-[#8A4F6E] transition shadow-md flex items-center justify-center gap-3">
                        <i class="fa-solid fa-birthday-cake"></i> أضف كعكة مخصصة للسلة
                    </button>
                </div>

                <div class="bg-white rounded-3xl p-6 shadow-sm border border-pink-100">
                    <h3 class="font-bold text-[#733251] mb-4">ملخص التصميم الخاص بك</h3>
                    <div class="space-y-4 text-gray-700">
                        <p>اختر طوابق الكعكة والنكهة والحشو والنص المفضل، ثم أضفها لتظهر في السلة مع التفاصيل كاملة.</p>
                        <ul class="list-disc pr-4 space-y-2 text-sm">
                            <li>طوابق مرنة: 1، 2، أو 3 طوابق.</li>
                            <li>نكهات أساسية فاخرة.</li>
                            <li>حشوات داخلية لذيذة.</li>
                            <li>نص خاص يطبَع بالكريمة.</li>
                        </ul>
                        <p class="text-xs text-gray-500">سيتم تضمين جميع التفاصيل في رسالة الطلب عبر واتساب حتى يصلك الطلب جاهزاً بالكامل.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section id="gallery" class="bg-white py-16 border-y border-pink-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center space-y-3 mb-10">
                <h2 class="text-3xl font-bold text-[#733251] brand-font">معرض إبداعات المخبز</h2>
                <p class="text-gray-500 text-sm max-w-md mx-auto">ألقِ نظرة على بعض التصاميم والكعكات الواقعية الفاخرة
                    التي قمنا بخبزها وتجهيزها</p>
            </div>

            <div class="flex justify-center gap-3 mb-10 flex-wrap">
                <button onclick="filterGallery('all', event)"
                    class="filter-btn bg-[#733251] text-white px-5 py-2 rounded-full text-xs font-semibold shadow transition duration-300">الكل</button>

                <button onclick="filterGallery('chocolate', event)"
                    class="filter-btn bg-gray-100 text-gray-600 hover:bg-[#FFF0F2] hover:text-[#733251] px-5 py-2 rounded-full text-xs font-semibold transition duration-300">شوكولاتة</button>
                <button onclick="filterGallery('party', event)"
                    class="filter-btn bg-gray-100 text-gray-600 hover:bg-[#FFF0F2] hover:text-[#733251] px-5 py-2 rounded-full text-xs font-semibold transition duration-300">مناسبات
                    وحفلات</button>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                <div class="gallery-item relative group overflow-hidden rounded-xl shadow-sm bg-gray-50 aspect-square"
                    data-category="wedding">
                    <img src="./images/i1.png" alt="كعكة زفاف"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    <div
                        class="absolute inset-0 bg-[#733251]/70 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center p-3 text-center">
                        <span class="text-white font-semibold text-sm">كعكة زفاف ملكية</span>
                    </div>
                </div>

                <div class="gallery-item relative group overflow-hidden rounded-xl shadow-sm bg-gray-50 aspect-square"
                    data-category="chocolate">
                    <img src="./images/i3.png" alt="كعكة شوكولاتة"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    <div
                        class="absolute inset-0 bg-[#733251]/70 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center p-3 text-center">
                        <span class="text-white font-semibold text-sm">شوكولاتة بالبندق فخمة</span>
                    </div>
                </div>

                <div class="gallery-item relative group overflow-hidden rounded-xl shadow-sm bg-gray-50 aspect-square"
                    data-category="party">
                    <img src="./images/i4.png" alt="كعكة مناسبات"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    <div
                        class="absolute inset-0 bg-[#733251]/70 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center p-3 text-center">
                        <span class="text-white font-semibold text-sm">كعكة عيد ميلاد مميزة</span>
                    </div>
                </div>

                <div class="gallery-item relative group overflow-hidden rounded-xl shadow-sm bg-gray-50 aspect-square"
                    data-category="wedding">
                    <img src="./images/i5.png" alt="كعكة"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    <div
                        class="absolute inset-0 bg-[#733251]/70 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center p-3 text-center">
                        <span class="text-white font-semibold text-sm">كعكة لافندر ناعمة</span>
                    </div>
                </div>

                <div class="gallery-item relative group overflow-hidden rounded-xl shadow-sm bg-gray-50 aspect-square"
                    data-category="chocolate">
                    <img src="./images/i6.png" alt="كعكة"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    <div
                        class="absolute inset-0 bg-[#733251]/70 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center p-3 text-center">
                        <span class="text-white font-semibold text-sm">كعكة كاكاو داكن غني</span>
                    </div>
                </div>

                <div class="gallery-item relative group overflow-hidden rounded-xl shadow-sm bg-gray-50 aspect-square"
                    data-category="party">
                    <img src="./images/i8.png" alt="كعكة"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    <div
                        class="absolute inset-0 bg-[#733251]/70 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center p-3 text-center">
                        <span class="text-white font-semibold text-sm">مكس فواكه استوائية</span>
                    </div>
                </div>

                <div class="gallery-item relative group overflow-hidden rounded-xl shadow-sm bg-gray-50 aspect-square"
                    data-category="chocolate">
                    <img src="./images/i9.png" alt="كعكة"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    <div
                        class="absolute inset-0 bg-[#733251]/70 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center p-3 text-center">
                        <span class="text-white font-semibold text-sm">كيك فادج شوكولاتة</span>
                    </div>
                </div>

                <div class="gallery-item relative group overflow-hidden rounded-xl shadow-sm bg-gray-50 aspect-square"
                    data-category="wedding">
                    <img src="./images/i10.png" alt="كعكة"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    <div
                        class="absolute inset-0 bg-[#733251]/70 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center p-3 text-center">
                        <span class="text-white font-semibold text-sm">كعكة خطوبة طوابق</span>
                    </div>
                </div>

                <div class="gallery-item relative group overflow-hidden rounded-xl shadow-sm bg-gray-50 aspect-square"
                    data-category="party">
                    <img src="./images/i11.png" alt="كعكة"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    <div
                        class="absolute inset-0 bg-[#733251]/70 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center p-3 text-center">
                        <span class="text-white font-semibold text-sm">كعكة التوت البري</span>
                    </div>
                </div>

                <div class="gallery-item relative group overflow-hidden rounded-xl shadow-sm bg-gray-50 aspect-square"
                    data-category="chocolate">
                    <img src="./images/i12.png" alt="كعكة"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    <div
                        class="absolute inset-0 bg-[#733251]/70 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center p-3 text-center">
                        <span class="text-white font-semibold text-sm">كراميل مالح وشوكولاتة</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="story" class="wave-bg py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center gap-12">
            <div class="w-full md:w-1/2 flex justify-center">
                <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=500&auto=format&fit=crop&q=80"
                    alt="Our Story Cake"
                    class="rounded-2xl shadow-xl max-w-full h-80 object-cover border-4 border-white">
            </div>
            <div class="w-full md:w-1/2 space-y-6 text-center md:text-right">
                <h2 class="text-3xl font-bold text-[#733251] brand-font">قصتنا وعشقنا للحلويات</h2>
                <p class="text-gray-600 leading-relaxed">
                    بدأنا كمتجر صغير يجمع الشغف بالخبز والأصالة في التصميم. نحن هنا لنحول مناسباتكم السعيدة إلى ذكريات
                    لا تُنسى عبر قوالب كيك مصممة يدوياً وبأعلى معايير الإتقان.
                </p>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 py-12 md:py-20 flex flex-col md:flex-row items-center gap-12">
        <div class="w-full md:w-1/2 flex justify-center">
            <img src="https://images.unsplash.com/photo-1542826438-bd32f43d626f?w=500&auto=format&fit=crop&q=80"
                alt="Detailed Cake" class="rounded-2xl shadow-lg max-w-sm h-[450px] object-cover border-4 border-white">
        </div>
        <div class="w-full md:w-1/2 space-y-6 text-right">
            <h2 class="text-3xl font-bold text-[#733251] brand-font">لماذا يختارنا الجميع؟</h2>
            <div class="space-y-4">
                <div class="flex items-start justify-start gap-3 flex-row-reverse">
                    <div class="text-[#733251] mt-1"><i class="fa-solid fa-heart"></i></div>
                    <p class="text-gray-600">نستخدم مكونات طبيعية 100% وخالية تماماً من المواد الحافظة الصناعية.</p>
                </div>
                <div class="flex items-start justify-start gap-3 flex-row-reverse">
                    <div class="text-[#733251] mt-1"><i class="fa-solid fa-heart"></i></div>
                    <p class="text-gray-600">خيارات متنوعة تناسب مرضى السكري والنباتيين (Vegan & Sugar-Free).</p>
                </div>
                <div class="flex items-start justify-start gap-3 flex-row-reverse">
                    <div class="text-[#733251] mt-1"><i class="fa-solid fa-heart"></i></div>
                    <p class="text-gray-600">تغليف فاخر ومقاوم للصدمات لضمان وصول الكعكة مذهلة وجذابة.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="bg-white py-16 border-t border-pink-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center space-y-3 mb-12">
                <h2 class="text-3xl font-bold text-[#733251] brand-font">تواصل معنا</h2>
                <p class="text-gray-500 text-sm max-w-md mx-auto">يسعدنا دائماً سماع آرائكم واستفساراتكم حول كعكاتنا</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
                <div class="space-y-6 text-right order-2 md:order-1">
                    <h3 class="text-xl font-bold text-gray-800">معلومات الاتصال</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-start gap-4 flex-row-reverse">
                            <div
                                class="w-10 h-10 bg-[#FFF0F2] rounded-full flex items-center justify-center text-[#733251]">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <span class="text-gray-600">البحيرة مركز كفر الدوار جمهورية مصر العربية</span>
                        </div>
                        <div class="flex items-center justify-start gap-4 flex-row-reverse">
                            <div
                                class="w-10 h-10 bg-[#FFF0F2] rounded-full flex items-center justify-center text-[#733251]">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <span class="text-gray-600" dir="ltr">+20 12 80733952</span>
                        </div>
                        <div class="flex items-center justify-start gap-4 flex-row-reverse">
                            <div
                                class="w-10 h-10 bg-[#FFF0F2] rounded-full flex items-center justify-center text-[#733251]">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <span class="text-gray-600">rania@gmail.com</span>
                        </div>
                    </div>
                    <div class="w-full h-48 rounded-2xl overflow-hidden shadow-inner border border-gray-100">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3403.473523577777!2d30.1250000!3d31.1350000!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzHCsDA4JzA2LjAiTiAzMMKwMDcnMzAuMCJF!5e0!3m2!1sar!2seg!4v1718640000000!5m2!1sar!2seg&q=شارع+الحدائق،+كفر+الدوار،+البحيرة،+مصر"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                <div class="bg-[#FFF0F2]/50 p-8 rounded-2xl border border-pink-100/60 text-right order-1 md:order-2">
                    <h3 class="text-xl font-bold text-[#733251] mb-6">أرسل لنا رسالة مباشرة</h3>
                    <form onsubmit="sendContactMessageToWhatsApp(event)" class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">الاسم الكامل</label>
                            <input type="text" id="contact-name" required
                                class="w-full px-4 py-3 rounded-xl border border-pink-200 focus:outline-none focus:border-[#733251] transition text-right"
                                placeholder="أدخل اسمك الكريم">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">البريد الإلكتروني أو
                                الهاتف</label>
                            <input type="text" id="contact-info" required
                                class="w-full px-4 py-3 rounded-xl border border-pink-200 focus:outline-none focus:border-[#733251] transition text-right"
                                placeholder="وسيلة التواصل معك">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">تفاصيل رسالتك</label>
                            <textarea rows="4" id="contact-msg" required
                                class="w-full px-4 py-3 rounded-xl border border-pink-200 focus:outline-none focus:border-[#733251] transition text-right"
                                placeholder="اكتب ما يدور في ذهنك هنا..."></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-[#733251] text-white py-3 rounded-xl font-bold hover:bg-[#8A4F6E] transition shadow-md flex items-center justify-center gap-2">
                            <i class="fa-brands fa-whatsapp text-lg"></i> إرسال عبر واتساب
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white border-t border-pink-100 py-12 text-center">
        <div class="max-w-7xl mx-auto px-6 space-y-6">
            <div class="text-2xl font-bold brand-font text-[#733251]">Cakes Oasis</div>
            <div class="flex justify-center space-x-6 space-x-reverse text-sm font-semibold text-gray-500">
                <a href="#home" class="hover:text-[#733251]">الرئيسية</a>
                <a href="#products" class="hover:text-[#733251]">المنتجات</a>
                <a href="#gallery" class="hover:text-[#733251]">المعرض</a>
                <a href="#story" class="hover:text-[#733251]">قصتنا</a>
            </div>
            <div class="flex justify-center space-x-4 space-x-reverse pt-2">
                <a href="#"
                    class="w-10 h-10 rounded-full bg-[#FFF0F2] text-[#733251] flex items-center justify-center hover:bg-[#733251] hover:text-white transition"><i
                        class="fa-brands fa-facebook-f"></i></a>
                <a href="#"
                    class="w-10 h-10 rounded-full bg-[#FFF0F2] text-[#733251] flex items-center justify-center hover:bg-[#733251] hover:text-white transition"><i
                        class="fa-brands fa-instagram"></i></a>
                <a href="#"
                    class="w-10 h-10 rounded-full bg-[#FFF0F2] text-[#733251] flex items-center justify-center hover:bg-[#733251] hover:text-white transition"><i
                        class="fa-brands fa-twitter"></i></a>
            </div>
            <p class="text-xs text-gray-400 pt-4">حقوق الطبع والنشر © 2026 محفوظة لـ Cakes Oasis.</p>
        </div>
    </footer>

    <script>
        // التحكم في المنيو الخاص بالهاتف
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // ميزة فلاتر التصفية لمعرض الصور
        function filterGallery(category, event) {
            const items = document.querySelectorAll('.gallery-item');
            const buttons = document.querySelectorAll('.filter-btn');
            buttons.forEach(btn => {
                btn.classList.remove('bg-[#733251]', 'text-white');
                btn.classList.add('bg-gray-100', 'text-gray-600');
            });
            const clickedButton = event ? event.currentTarget : document.querySelector(`.filter-btn[onclick*="${category}"]`);
            if (clickedButton) {
                clickedButton.classList.remove('bg-gray-100', 'text-gray-600');
                clickedButton.classList.add('bg-[#733251]', 'text-white');
            }
            items.forEach(item => {
                if (category === 'all' || item.getAttribute('data-category') === category) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        }

        // ==================== 🛒 نظام سلة المشتريات والتواصل الحقيقي عبر الواتساب 🛒 ====================

        // ⚠️ ضعي رقم الواتساب الفعلي الخاص بكِ هنا بدلاً من الرقم الافتراضي الحالي (بدون أصفار في البداية ومع كود الدولة)
        const WHATSAPP_NUMBER = "+201280733952";

        // تحديث الرابط التلقائي لزر الواتساب العائم الافتراضي عند تشغيل الصفحة
        document.getElementById('general-whatsapp-btn').href = `https://wa.me/${WHATSAPP_NUMBER}?text=%D9%85%D8%B1%D8%AD%D8%A8%D8%A7%D9%8B%20%D9%83%D9%8A%D9%83%20%D8%A3%D9%84%D9%88%D8%A7%D8%B3%D9%8A%D8%B3%D8%8C%20%D9%84%D8%AF%D9%8A%20%D8%A7%D8%B3%D8%AA%D9%81%D8%B3%D8%A7%D8%B1%20%D8%B9%D8%A7%D9%85.`;

        let cart = [];

        function toggleCartMenu() {
            const sidebar = document.getElementById('cart-sidebar');
            sidebar.classList.toggle('translate-x-full');
        }

        function addToCart(name, price) {
            const existingItem = cart.find(item => item.name === name);
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    name: name,
                    price: price,
                    quantity: 1
                });
            }
            updateCartUI();

            const sidebar = document.getElementById('cart-sidebar');
            sidebar.classList.remove('translate-x-full');
        }

        function removeFromCart(name) {
            cart = cart.filter(item => item.name !== name);
            updateCartUI();
        }

        function addCustomCakeToCart() {
            const tiers = document.querySelector('input[name="cake-tiers"]:checked').value;
            const flavor = document.getElementById('cake-flavor').value;
            const filling = document.getElementById('cake-filling').value;
            const customText = document.getElementById('cake-message').value.trim() || 'بدون نص';
            const productName = `كعكة مخصصة (${tiers}، ${flavor}، ${filling}، "${customText}")`;
            const price = 1200.00;

            const existingItem = cart.find(item => item.name === productName);
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    name: productName,
                    price: price,
                    quantity: 1
                });
            }
            updateCartUI();

            const sidebar = document.getElementById('cart-sidebar');
            sidebar.classList.remove('translate-x-full');
        }

        function updateCartUI() {
            const container = document.getElementById('cart-items-container');
            const badge = document.getElementById('cart-badge');
            const totalText = document.getElementById('cart-total-price');
            const emptyText = document.getElementById('empty-cart-text');

            container.innerHTML = "";
            let totalItems = 0;
            let totalPrice = 0;

            if (cart.length === 0) {
                emptyText.style.display = "block";
                container.appendChild(emptyText);
                badge.classList.add('hidden');
                totalText.innerText = "$0.00";
                return;
            }

            emptyText.style.display = "none";

            cart.forEach(item => {
                totalItems += item.quantity;
                totalPrice += (item.price * item.quantity);

                const itemRow = document.createElement('div');
                itemRow.className = "flex justify-between items-center bg-gray-50 p-3 rounded-xl border border-gray-100 flex-row-reverse";
                itemRow.innerHTML = `
                    <div class="text-right">
                        <h4 class="font-bold text-sm text-gray-800">${item.name}</h4>
                        <p class="text-xs text-gray-400 mt-0.5">$${item.price} × ${item.quantity}</p>
                    </div>
                    <button onclick="removeFromCart('${item.name}')" class="text-red-500 hover:text-red-700 text-sm p-1"><i class="fa-solid fa-trash-can"></i></button>
                `;
                container.appendChild(itemRow);
            });

            badge.innerText = totalItems;
            badge.classList.remove('hidden');
            totalText.innerText = `$${totalPrice.toFixed(2)}`;
        }

        // 1. ميزة إتمام الطلب من السلة بالكامل عبر الواتساب حقيقياً
        function checkoutToWhatsApp() {
            if (cart.length === 0) {
                alert("السلة فارغة حالياً! الرجاء إضافة بعض المنتجات أولاً.");
                return;
            }

            let message = `*طلب جديد من موقع Cakes Oasis* 🍰\n\n`;
            message += `مرحباً، أود تسجيل طلب لشراء المنتجات التالية:\n`;
            message += `----------------------------------\n`;

            let total = 0;
            cart.forEach((item, index) => {
                const subtotal = item.price * item.quantity;
                total += subtotal;
                message += `${index + 1}) *${item.name}*\n     العدد: ${item.quantity} 💬 | السعر: $${subtotal.toFixed(2)}\n`;
            });

            message += `----------------------------------\n`;
            message += `*إجمالي الحساب الفعلي:* $${total.toFixed(2)}\n\n`;
            message += `الرجاء تأكيد الطلب وتحديد موعد الاستلام وتفاصيل التوصيل وشكراً لكم! ✨`;

            const deliveryAddress = document.getElementById('cart-delivery-address').value.trim();
            const preferredDateTime = document.getElementById('cart-preferred-datetime').value.trim();
            const bakerNotes = document.getElementById('cart-baker-notes').value.trim();

            if (deliveryAddress) {
                message += `🏠 *عنوان التوصيل:* ${deliveryAddress}
`;
            }
            if (preferredDateTime) {
                message += `🕒 *موعد الاستلام المطلوب:* ${preferredDateTime}
`;
            }
            if (bakerNotes) {
                message += `📝 *ملاحظات للخبّاز:* ${bakerNotes}
`;
            }

            const encodedMessage = encodeURIComponent(message);
            const whatsAppUrl = `https://wa.me/${WHATSAPP_NUMBER}?text=${encodedMessage}`;

            window.open(whatsAppUrl, '_blank');
        }

        // 2. ميزة إرسال استمارة تواصل معنا حقيقياً عبر الواتساب
        function sendContactMessageToWhatsApp(event) {
            event.preventDefault(); // منع الصفحة من إعادة التحميل الافتراضية

            // جلب البيانات المدخلة في الاستمارة
            const name = document.getElementById('contact-name').value;
            const contactInfo = document.getElementById('contact-info').value;
            const userMsg = document.getElementById('contact-msg').value;

            // بناء رسالة التواصل المنسقة
            let message = `*رسالة تواصل جديدة من الموقع* 📬\n\n`;
            message += `👤 *اسم العميل:* ${name}\n`;
            message += `📞 *وسيلة الاتصال:* ${contactInfo}\n`;
            message += `💬 *تفاصيل الرسالة:* \n${userMsg}\n\n`;
            message += `----------------------------------`;

            const encodedMessage = encodeURIComponent(message);
            const whatsAppUrl = `https://wa.me/${WHATSAPP_NUMBER}?text=${encodedMessage}`;

            // فتح الواتساب تلقائياً لإرسال الرسالة الحقيقية
            window.open(whatsAppUrl, '_blank');

            // إعادة ضبط وتفريغ الاستمارة بعد الإرسال
            document.getElementById('contact-name').value = '';
            document.getElementById('contact-info').value = '';
            document.getElementById('contact-msg').value = '';
        }
    </script>
</body>

</html>
