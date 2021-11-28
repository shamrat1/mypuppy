var citiesByState = {

    "New South Wales": ["Albury-Wodonga", "Armidale", "Ballina", "Balranald", "Batemans Bay", "Bathurst", "Bega", "Bourke", "Bowral", "Broken Hill", "Byron Bay",
        "Camden", "Campbelltown", "Cobar", "Coffs Harbour", "Cooma", "Coonabarabran", "Coonamble", "Cootamundra",
        "Corowa", "Cowra", "Deniliquin", "Dubbo", "Forbes", "Forster", "Glen Innes", "Gosford", "Goulburn", "Grafton", "Griffith", "Gundagai", "Gunnedah", "Hay", "Inverell", "Junee", "Katoomba", "Kempsey", "Kiama", "Kurri Kurri", "Lake Cargelligo", "Lismore", "Lithgow", "Maitland",
        "Moree", "Moruya", "Murwillumbah", "Muswellbrook", "Nambucca Heads", "Narrabri", "Narrandera", "Newcastle", "Nowra-Bomaderry", "Orange", "Parkes", "Parramatta", "Penrith", "Port Macquarie", "Queanbeyan", "Raymond Terrace", "Richmond", "Scone",
        "Singleton", "Sydney", "Tamworth", "Taree", "Temora", "Tenterfield", "Tumut", "Ulladulla", "Wagga Wagga", "Wauchope", "Wellington", "West Wyalong", "Windsor", "Wollongong", "Wyong", "Yass", "Young"
    ],
    "Northern Territory": ["Alice Springs", "Anthony Lagoon", "Darwin", "Katherine", "Tennant Creek"],
    "Queensland": ["Ayr", "Beaudesert", "Blackwater", "Bowen", "Brisbane", "Buderim", "Bundaberg", "Caboolture", "Cairns", "Charleville", "Charters Towers", "Cooktown", "Dalby", "Deception Bay", "Emerald", "Gatton", "Gladstone", "Gold Coast", "Goondiwindi",
        "Gympie", "Hervey Bay", "Ingham", "Innisfail", "Kingaroy", "Mackay", "Mareeba", "Maroochydore", "Maryborough", "Moonie",
        "Moranbah", "Mount Isa", "Mount Morgan", "Moura", "Redcliffe", "Rockhampton", "Roma", "Stanthorpe", "Toowoomba", "Townsville", "Warwick", "Weipa", "Winton", "Yeppoon"
    ],
    "South Australia": ["Adelaide", "Ceduna", "Clare", "Coober Pedy", "Gawler", "Goolwa", "Iron Knob", "Leigh Creek", "Loxton", "Millicent", "Mount Gambier", "Murray Bridge", "Naracoorte", "Oodnadatta", "Port Adelaide Enfield", "Port Augusta", "Port Lincoln", "Port Pirie", "Renmark", "Victor Harbor", "Whyalla"],
    "Tasmania": ["Beaconsfield", "Bell Bay", "Burnie", "Devonport", "Hobart", "Kingston", "Launceston", "New Norfolk", "Queenstown", "Richmond", "Rosebery", "Smithton", "Stanley", "Ulverstone", "Wynyard"],
    "Victoria": ["Albury-Wodonga", "Ararat", "Bacchus Marsh", "Bairnsdale", "Ballarat", "Beechworth", "Benalla", "Bendigo", "Castlemaine", "Colac", "Echuca", "Geelong", "Hamilton", "Healesville", "Horsham", "Kerang", "Kyabram", "Kyneton", "Lakes Entrance", "Maryborough", "Melbourne", "Mildura", "Moe", "Morwell",
        "Port Fairy", "Portland", "Sale", "Sea Lake", "Seymour", "Sunbury", "Swan Hill", "Traralgon", "Yarrawonga", "Wangaratta", "Warragul", "Werribee", "Wonthaggi"
    ],
    "Western Australia": ["Broome", "Bunbury", "Busselton", "Coolgardie", "Dampier", "Derby", "Fremantle", "Geraldton", "Kalgoorlie", "Kambalda", "Katanning", "Kwinana", "Mandurah", "Meekatharra", "Mount Barker", "Narrogin", "Newman", "Northam", "Perth", "Port Hedland", "Tom Price", "Wyndham"]
}

function makeSubmenu(value) {
    if (value.length == 0) document.getElementById("citySelect").innerHTML = "<option></option>";
    else {
        var citiesOptions = "";
        for (cityId in citiesByState[value]) {
            citiesOptions += "<option>" + citiesByState[value][cityId] + "</option>";
        }
        document.getElementById("citySelect").innerHTML = citiesOptions;
    }
}