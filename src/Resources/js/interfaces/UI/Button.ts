import { type PrimitiveProps } from 'reka-ui'
import { type ButtonVariants, buttonTypes, buttonIcons } from '@klinik/components/ui/button';
import type { HTMLAttributes } from 'vue'

export interface Button extends PrimitiveProps {
  variant?: ButtonVariants['variant']
  size?: ButtonVariants['size']
  class?: HTMLAttributes['class']
  buttonType?: keyof typeof buttonTypes | null
  icon?: keyof typeof buttonIcons | null
  rawIcon?: string
  onClick?: Function;
  attributes ?: HTMLAttributes
}