import { generateClasses } from '@formkit/themes'

const config = {
    config: {
        classes: generateClasses({
            global: {
                label: 'block my-2 font-popins text-title md:text-lg xl:text-xl',
                input: 'rounded-md border border-header py-2 px-3 w-[310px] 2md:w-[420px] lg:w-[500px] 2xl:w-full 2xl:py-3 mb-2',
                message: 'text-red-500 text-sm font-poppins capitalize'
            },
            file: {
                input: 'rounded-md border border-icons border-dashed py-36 px-3 w-full, bg-main',
                noFile: 'block my-2',
                fileItem: 'hidden'
            },
        }),
    }
}

export default config